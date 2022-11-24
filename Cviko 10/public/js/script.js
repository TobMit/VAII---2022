class Chat {
    constructor() {
        this.msgElement = document.getElementById("messages");
    }

    async getMessages() {
        let response = await fetch('?c=api&a=getall');
        let data = await  response.json();

        this.msgElement.innerHTML = "";

        data.forEach(msg => {

            this.msgElement.innerHTML += '<div>' + msg.message + '</div>';
        });

        setTimeout(() => {
            this.getMessages();
        }, 1000);
    }
}
var chat;

window.onload = function () {
    chat = new Chat();
    chat.getMessages();
}