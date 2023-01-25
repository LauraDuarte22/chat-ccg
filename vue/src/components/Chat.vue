<template>
    <div
        class="bg-black p-12 relative"
        style="
            background-image: url('https://i.pinimg.com/236x/8f/ba/cb/8fbacbd464e996966eb9d4a6b7a9c21e--sultan.jpg');
            border-radius:10px;
        "
    >
        <div class="overflow-hidden " style="height: 600px">
            <div
                v-for="(chat, chatIndex) in chatHistory"
                :key="chatIndex"
                style="position: relative"
            >
                <div
                    v-bind:class="[
                        chatIndex % 2 == 0
                            ? 'np-chat--text np-chat--text_sent'
                            : 'np-chat--text np-chat--text_received',
                    ]"
                >
                    <span class="opacity-75"
                        >{{ getChatTimeLocal(chat.time) }}:</span
                    >
                    {{ chat.message }}
                </div>
            </div>
        </div>
        <div class="np-input-text--value_holder">
            <input
                class="np-input-text--value"
                type="text"
                placeholder="Mensaje"
                v-model="chat.sendMessage"
              
            />
            <button
            @click="sendMessage()">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                   style="display:inline-block"
                    width="40px"
                    height="40px"
                  
                >
                    <title>Send, paper, plane</title>
                    <path
                        d="M40.7073,7.2927a1.004,1.004,0,0,0-1.0391-.2363l-34,12A1,1,0,0,0,5.67,20.9433l15.8381,5.5489,5.5489,15.839A1,1,0,0,0,27.9982,43H28a1,1,0,0,0,.9433-.667l12-34A1.0047,1.0047,0,0,0,40.7073,7.2927ZM28.0041,38.9855,23.4444,25.97l5.212-5.213a1,1,0,0,0-1.4141-1.414L22.03,24.5559,9.0156,19.996,38.3616,9.6385Z"
                        fill="#646464"
                    />
                </svg>
            </button>
        </div>
    </div>
</template>

<script setup>
import store from "../store";
const chat = {
    time: "",
    sendMessage: "",
    receivedMessage:''
};
function sendMessage(){
 
    store
        .dispatch("sendMessage", chat)
        .then((data) => {
            console.log("todo ok")
        })
        .catch((e) => {
           
        });
}
</script>
<style>
.np-chat--text {
    width: 200px;
    font-size: 12px;
    letter-spacing: 0.4px;
    background: #eee;
    word-break: keep-all;
    margin: 4px 6px;
    padding: 6px 10px;
    border-radius: 50px;
    color: #fff;
    line-height: 1.4;
}

.np-chat--text_received {
    background: #005d4b;
    float: right;
}
.np-chat--text_sent {
    background: #1f2c34;
    float: left;
}

.np-input-text--value {
    padding: 6px 4px;
    width: 90%;
    font-size: 14px;
    background-color: aliceblue;
    border: 1px solid aliceblue;
    border-radius: 30px;
    color: black;
    outline: none;
    transform: translateY(6px);
}

</style>
