

<link rel="stylesheet" href="{{static_asset('backend/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{static_asset('plugins/')}}/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{static_asset('plugins/')}}/markdown/simplemde.min.css">
    <link rel="stylesheet" href="{{static_asset('common/')}}/style.css">
    <link rel="stylesheet" href="{{static_asset('common/')}}/simple_ide_dark.css">
    <link rel="stylesheet" href="{{static_asset('plugins/')}}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{static_asset('plugins/')}}/prism/prism.css">
@stack('styles')


<style>
    a{
        color:white !important;
    }
    .dropdown-menu-right{
        right: 0 !important;
        left: unset;
    }
    /* Profile Image */
    .profile_image {
        border: 2px solid #6b6b6b;
        width: 250px;
        height: 250px;
        object-fit: cover;
        object-position: center center;

    }

    .profile_image_overlayer{
        position: absolute;
        left: 50%;
        background: #6c6c6c;
        top: 50%;
        transform: translate(-50%,-50%);
        width: 100%;
        height: 100%;
        border-radius: 50%;
        opacity: 0.0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        transition: 0.3s;
    }
    .profile_image_overlayer:hover{
        opacity: 0.8;
    }
    .profile_image_overlayer i{
        margin: 0;  font-size: 34px;
    }
    /* Profile Image */


    body{
        background: #454d55;
        color: #fff;
    }
    .card,
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active,
    .modal-content,

    .card-body{
        background: #2b2a2a;
        color: #fff;
    }
    .card-body .editor-toolbar a{
        color:#fff !important;
    }
    .card-body  .editor-toolbar a:hover{
        color:black !important;
    }
    hr{
        color: #2b2a2a;
        background: #2b2a2a;
    }

    i{
        color: white;
        margin-right: 10px;
    }
    .dropdown-toggle{
        cursor: pointer;
    }
    .container{
        max-width: 95% !important;
    }
    .gap-2{
        gap: 5px;
    }
    a:focus,
    a:visited,
    a,
    a:hover{
        color: #007bff;
    }
    .d-none{
        display: none !important;
    }
    .sub_items div{
        cursor: pointer;
    }
    .subitems_cluse_btn{
        display: flex;
        align-items: center;
        background: red;
        justify-content: center;
        padding: 7px 0 7px 10px;
    }

    hr{
        border-color: #575758;
    }




    /* Change Autocomplete styles in Chrome*/
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover,
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
    border: 1px solid rgb(8, 155, 57);
    -webkit-text-fill-color: rgb(255, 255, 255);
    -webkit-box-shadow: 0 0 0px 1000px #000 inset;
    transition: background-color 5000s ease-in-out 0s;
    }
    .card-header{
        background-color:rgba(0, 0, 0, .49)
    }
    code[class*=language-], pre[class*=language-]{
        font-size: .8rem;
}
.card-body{
    border-left: 7px solid #161515;
}
.h4, h4{
    font-size: inherit;
}
.card-body img{
    max-width: 100%;
}

.dropdown-menu.show {
    right:0;
    left:unset;

}
.dropdown-menu.show button,
.dropdown-menu.show a{
    color:white;
}
.dropdown-menu.show a:hover,
.dropdown-menu.show button:hover,
.dropdown-menu.show button.active,
.dropdown-menu.show a.active{
    background:#6b6b6b !important;

}
</style>
