import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let btnSendValid = document.getElementById('send-valid-btn');

if (btnSendValid) {
    let createForm = btnSendValid.closest('form');

    btnSendValid.addEventListener('click', () => {

        window.axios.post('/messages/valid',
            {
                title: createForm.querySelector('#title').value,
                content: createForm.querySelector('#content').value
            })
            .then((response) => console.log(response));
    });

}
