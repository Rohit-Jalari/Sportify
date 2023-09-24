

var cleave = new Cleave(".delimiter-mask", {
    delimiter: " - ",
    blocks: [5, 4, 4],
    uppercase: true,
    numericOnly: false,
});

function addPrefix(e) {
    if (!e.value.startsWith('#')) {
        cleave.destroy();
        cleave = new Cleave(".delimiter-mask", {
            prefix: '#',
            delimiter: " - ",
            blocks: [5, 4, 4],
            uppercase: true,
            numericOnly: false,
        });
    }
}

function removePrefix(e) {
    if (e.value == '#') {
        e.value = '';
    }
}

window.addEventListener('load', () => {
    inputLimitLoad('target', 'input', 13);
});
