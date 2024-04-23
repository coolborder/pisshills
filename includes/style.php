<!-- BEGIN INCLUDED STYLE -->

<style>
    body {
        background-image: url("/imgs/wn95.jpg");
        background-size: cover; 
    }

    .invItem {
        text-align: center;
        display: inline-block;
        word-wrap: break-word;
    }

    .ftxt {
        float: left;
        left: 320px;
        position: relative;
    }

    .xtxt {
        position: relative;
        top: -24px;
        display: inline-block;
    }

    .rect {
        width: 500px;
        background: white;
    }

    .rect2 {
        width: 340px;
        height: 288px;
        text-align: right;
        overflow: auto;
        float: left;
    }


    .fuckyou {
        display: inline-block;
        filter: drop-shadow(0 0 15px #fe0) drop-shadow(0 0 10px #ec1) drop-shadow(0 0 5px #ec4) drop-shadow(0 0 2px #ec6) drop-shadow(0 0 2px #fff);
        animation: fuckyou 0.7s linear infinite;
        color: #000;
    }

    .rotating {
        display: inline-block !important;
        animation: rotate 5s linear infinite;
    }

    .feed {
        border-style: solid;
        border-width: 1px;
        padding: 20px;
    }

    .feedcontent {
        border-style: solid;
        border-width: 1px;
        padding: 20px;  
    }
    
    @keyframes rotate {
        0% {
            transform: rotate(0);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes fuckyou {
        0% {
            transform: perspective(100px) rotateY(0turn) scale(2) rotateX(0.1turn);
        }
        100% {
            transform: perspective(100px) rotateY(1turn) scale(2) rotateX(0.1turn);
        }
    }

    
    .grid-container {
        display: grid;
        grid-template-columns: 30px 30px 30px;
        margin: center;
        grid-gap: 5px;
        justify-content: center;
    }
</style>

<!-- END INCLUDED STYLE -->