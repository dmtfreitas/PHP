function load_message() {
    fetch('message.php')
    .then(response => response.text())
    .then(text => {
        document.getElementById('result').innerHTML = text;
    });
}