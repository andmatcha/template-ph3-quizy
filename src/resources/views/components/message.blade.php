<style>
    .message {
        border: double 4px #ccc;
        color: #999;
        margin: 10px;
        padding: 10px;
        background-color: #fafafa;
    }

    .msg_title {
        margin: 10px 20px;
        color: #999;
        font-size: 16px;
        font-weight: bold;
    }
    .msg_content {
        margin: 10px 20px;
        color: #aaa;
        font-size: 12px;
    }
</style>

<div class="message">
    <p class="msg_title">{{ $msg_title }}</p>
    <p class="msg_content">{{ $msg_content }}</p>
</div>
