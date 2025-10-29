const checkbox = document.getElementById('checkbox');
const button = document.getElementById('botao');

checkbox.addEventListener('change', () => {
    if (checkbox.checked) {
        button.disabled = false;
        button.classList.add('ativo');
    } else {
        button.disabled = true;
        button.classList.remove('ativo');
    }
});