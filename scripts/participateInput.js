
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
window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('input').disabled = true;
    console.log('t');
  });
window.addEventListener('load', () => {
    document.getElementById('input').disabled = false;
    participateProcessor('target', 'input', 13);
});
