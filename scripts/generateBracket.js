
var body = document.getElementById('body');
const BRACKETS = 'brackets';
const INPUT_MASK = 'input-mask';
const INPUT_SUBMIT = 'input-submit';
const OPPONENT1 = 'opponent1';
const OPPONENT2 = 'opponent2';
const ELEMENT_ID = 'bracketsViewerExample';
const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');

const configBracket = {
    parent_id: 'createNewBracket',
    html_name_id: 'name',
    html_stage_type_selector_id: 'selector',
    html_team_names_input_id: 'teams',
    html_team_count_input_id: 'team-count',
    html_group_id: 'groups',
    html_seed_order_id: 'seeds',
    html_round_robin_mode_id: 'round-robin-mode',
    html_consolation_final_checkbox_id: 'consolation_final',
    html_skip_first_round_checkbox_id: 'skip_first',
    html_grand_final_type_id: 'grand_final',
    html_double_elimination_seed_textarea_id: 'double_elimination_seeds',
    group_default_size: 1
}

function listBrackets() {
    const storageData = JSON.parse(localStorage.getItem(BRACKETS)) || {};
    const bracketsList = document.createElement('ul');

    for (const [key, value] of Object.entries(storageData)) {
        const bracketItem = document.createElement('li');
        const bracketLink = document.createElement('a');
        bracketLink.href = '?id=' + key;
        bracketLink.innerText = 'Go to ID: ' + key;

        bracketItem.appendChild(bracketLink);
        bracketsList.appendChild(bracketItem);
    }
    body.insertBefore(bracketsList, document.getElementById(ELEMENT_ID));
}

function loadData(id) {
    const bracketsStore = JSON.parse(localStorage.getItem(BRACKETS));

    if (null === bracketsStore || !(id in bracketsStore)) {
        alert('Key is not found in data!');
        window.location.search = '?id'
        return;
    }
    return bracketsStore[id];
}

function renderBracket(data) {
    document.getElementById(ELEMENT_ID).innerHTML = '';
    window.bracketsViewer.render({
        stages: data.stage,
        matches: data.match,
        matchGames: data.match_game,
        participants: data.participant,
    }, {
        selector: '#' + ELEMENT_ID,
        participantOriginPlacement: 'before',
        separatedChildCountLabel: true,
        showSlotsOrigin: true,
        showLowerBracketSlotsOrigin: true,
        highlightParticipantOnHover: true,
    });
}

if (id === null || id === '') {
    listBrackets();
    window.stageFormCreator(configBracket, async (configBracket) => {
        await window.bracketsManager.create.stage(configBracket)
        const rawStoredBrackets = localStorage.getItem(BRACKETS);

        if (null === rawStoredBrackets || '' === rawStoredBrackets) {
            localStorage.setItem(BRACKETS, JSON.stringify({
                0: window.inMemoryDatabase.data,
            }));
            window.location.href = '?id=0';
        }
        let storedBrackets = JSON.parse(rawStoredBrackets);
        console.log(storedBrackets);

        let index = Object.keys(storedBrackets).length;
        storedBrackets[index] = window.inMemoryDatabase.data;

        localStorage.setItem(BRACKETS, JSON.stringify(storedBrackets));
        window.location.href = '?id=' + index;
    });
} else {
    const backLink = document.createElement('a');
    backLink.href = '?id';
    backLink.innerText = 'Go back';
    body.insertBefore(backLink, document.getElementById('updateCurrentBracket'));

    const deleteButton = document.createElement('a');
    deleteButton.href = '?id';
    deleteButton.innerText = 'Delete';
    body.insertBefore(deleteButton, document.getElementById('updateCurrentBracket'));

    deleteButton.addEventListener('click', async (e) => {
        const bracketsStore = JSON.parse(localStorage.getItem(BRACKETS));
        delete bracketsStore[id];
        localStorage.setItem(BRACKETS, JSON.stringify(bracketsStore));
    });

    window.updateFormCreator({ ...configBracket, parent_id: 'updateCurrentBracket' }, async (configBracket) => {
        await window.bracketsManager.create.stage(configBracket)
        const rawStoredBrackets = localStorage.getItem(BRACKETS);
        let storedBrackets = JSON.parse(rawStoredBrackets);
        console.log(storedBrackets);

        // Overwrite the bracket
        let index = Object.keys(storedBrackets).length - 1;
        storedBrackets[index] = window.inMemoryDatabase.data;
        localStorage.setItem(BRACKETS, JSON.stringify(storedBrackets));

        // Reload the page
        window.location.href = '?id=' + index;
    });

    window.bracketsViewer.onMatchClicked = async (match) => {
        const inputMask = document.getElementById(INPUT_MASK);
        inputMask.style.display = 'flex';

        const matchTitle = document.querySelector(`[data-match-id="${match.id}"] .opponents > span`).textContent;
        inputMask.querySelector('h3').innerText = matchTitle;

        const enterKeyListener = (event) => {
            if (event.key === 'Enter') {
                updateMatch()
            }
        }
        document.addEventListener('keypress', enterKeyListener)

        const updateMatch = async () => {
            const opponent1 = parseInt(document.getElementById(OPPONENT1).value);
            const opponent2 = parseInt(document.getElementById(OPPONENT2).value);
            const data = loadData(id);
            await window.bracketsManager.import(data);

            await window.bracketsManager.update.match({
                id: match.id,
                status: 4,
                opponent1: { score: opponent1 },
                opponent2: { score: opponent2 },
            });
            const newData = await window.bracketsManager.export();
            renderBracket(newData);
            const bracketsStore = JSON.parse(localStorage.getItem(BRACKETS));
            bracketsStore[id] = newData;
            localStorage.setItem(BRACKETS, JSON.stringify(bracketsStore));
            inputMask.style.display = 'none';
            document.removeEventListener('keypress', enterKeyListener);
            location.reload(true);
        }
        const inputButton = document.getElementById(INPUT_SUBMIT);
        inputButton.onclick = updateMatch
    }
    const data = loadData(id);
    renderBracket(data);
}