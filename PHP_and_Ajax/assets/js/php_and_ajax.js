const elEmailId = document.querySelector('div#mail')

fetch('http://localhost:3030/mails')
    .then(res => res.json())
    .then(resData => {
        const ulElement = document.createElement('div')
        for(let email of resData) {
            const liEl = document.createElement('div')
            liEl.innerText = email
            ulElement.appendChild(liEl)
        }
        elEmailId.appendChild(ulElement)
    })

const formEl = document.querySelector('form#saveEmail')

formEl.addEventListener('submit', event => {
    event.preventDefault()
    const formData = new FormData(formEl)
    const body = {
        mail: formData.get('mail')
    }
    fetch('http://localhost:3030/mails', {
        method: 'POST',
        body: JSON.stringify(body)
    })
    .then(res => res.json())
    .then(resData => location.reload())
})