<head>
    <title>Renegade</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>
</head>

<style>

    body {
        background-color: #F6EEFF !important;
    }

    .welcome {
        font-style: italic;
        text-align: center;

    }
    .cs-alert {
        width: 60%;
        margin: 5px;
        position: absolute !important;
        top: 0;
        right: 0;
        z-index: 100;
    }
    .is-success {
        background-color: #48c774;
        color: #fff;
    }
    .notification {
        border-radius: 4px;
        padding: 1.25rem 2.5rem 1.25rem 1.5rem;
        position: relative;
    }
    .notification>.delete {
        position: absolute;
        right: .5rem;
        top: .5rem;
    }
    .delete {
        -webkit-appearance: none;
        background-color: rgba(10,10,10,.2);
        border: none;
        border-radius: 290486px;
        cursor: pointer;
        pointer-events: auto;
        display: inline-block;
        flex-grow: 0;
        flex-shrink: 0;
        font-size: 0;
        height: 20px;
        max-height: 20px;
        max-width: 20px;
        min-height: 20px;
        min-width: 20px;
        outline: 0;
        position: relative;
        vertical-align: top;
        width: 20px;
    }
    .delete::before {
        height: 2px;
        width: 50%;
    }
    .delete::after {
        height: 50%;
        width: 2px;
    }
    .delete::after, .delete::before {
        background-color: #fff;
        content: "";
        display: block;
        left: 50%;
        position: absolute;
        top: 50%;
        transform: translateX(-50%) translateY(-50%) rotate(45deg);
        transform-origin: center center;
    }
    .cs-p-1 {
        padding-bottom: .5rem;
        padding-top: .5rem;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .header {
        max-width: 80%;
    }

    .content {
        max-width: 70%;
        margin: auto;
        margin-top: 15px;
        background-color: white;
        border-radius: 4px;
        padding: 15px;

    }

    .searchbar {
        max-width: 40%;
        border-radius: 4px;
        margin-bottom: 15px;
        border: 1px solid grey;

    }
    .button:after {
        transition: none;
    }

    #input-group {
        border: none;
    }

    .denied {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .denied > p {
        padding: 5px;
    }

    .form-control {
        border: none; !important
    }
    .button {
        border: 1px solid grey;
        padding: 15px 32px;
        text-align: center;
        display: inline-block;
    }

    .place-comment {
        border: 1px solid grey;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .single-comment {
        padding: 10px;
        border-top: 1px solid grey;

    }

    .preview {
        max-width: 100px;
        max-height: 100px;
    }

    .image-table{
        cursor: pointer;
    }

</style>
