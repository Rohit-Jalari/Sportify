
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
        const targetDiv = document.getElementById("target");
        while (targetDiv.firstChild) {
            targetDiv.removeChild(targetDiv.firstChild);
        }
    }
}
window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('input').disabled = true;
});
window.addEventListener('load', () => {
    document.getElementById('input').disabled = false;
    participateProcessor('target', 'input', 13);
});
