class Chat {
    constructor() {
        this.msgElement = document.getElementById("messages");
        this.inputChat = document.getElementById("chadTesxt");
        this.btnChatSend = document.getElementById("chadTlacitko");

        thi
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

    async sendMesage() {
        let d = await fetch('?c=api&a=savemessage', {
           method: 'Post',
            headers: "someting treba googlit",
           body:  "message +=" + this.inputChat.value
        });
    }
}
var chat;

window.onload = function () {
    chat = new Chat();
    chat.getMessages();
}