<link rel="stylesheet" href="../vendor/Bracket/dist/brackets-viewer.min.css" />
<script type="text/javascript" src="../vendor/Bracket/dist/brackets-viewer.min.js"></script>

<!-- You can choose a default theme or make you own. -->
<link rel="stylesheet" href="../vendor/Bracket/themes/dark.css" />

<style>
    #input-mask {
        position: absolute;
        left: 50%;
        margin-left: -150px;
        height: 190px;
        top: 50%;
        margin-top: -95px;
        background: #9e9e9e;
        box-shadow: #14191f;
        border-radius: 5px;
        z-index: 1;
        display: none;
        justify-content: center;
        align-items: center;
    }

    #input-mask div {
        text-align: center;
        background: lightgrey;
        padding: 10px 20px;
    }

    #createNewBracket>div {
        display: grid;
        grid-template-columns: 1fr 2fr;
        margin: 5px;
        align-items: center;
        justify-content: center;
    }

    #createNewBracket>div:last-child {
        grid-template-columns: 1fr;
    }
</style>