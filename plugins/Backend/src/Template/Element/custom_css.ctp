
    <style>

/* .alert.alert-icon-right:after {
content: '\f087' !important;
font-weight: 900;
font-family: "Font Awesome 5 Free" !important;

} */

span.required {
    color: red;
}

td,
th {
    text-align: center;
}


.error-message {
    color: red;
}


/*
        Custom Radio Styling
*/

@keyframes click-wave {
    0% {
        height: 40px;
        width: 40px;
        opacity: 0.35;
        position: relative;
    }
    100% {
        height: 110px;
        width: 110px;
        margin-left: -50px;
        margin-top: -50px;
        opacity: 0;
    }
}

.option-input {
    -webkit-appearance: none;
    -moz-appearance: none;
    -ms-appearance: none;
    -o-appearance: none;
    appearance: none;
    position: relative;
    top: 13.33333px;
    right: 0;
    bottom: 0;
    left: 0;
    height: 40px;
    width: 40px;
    transition: all 0.15s ease-out 0s;
    background: #cbd1d8;
    border: none;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    margin-right: 0.5rem;
    outline: none;
    position: relative;
    z-index: 1000;
} 

.option-input:hover {
    /* background: #9faab7; */
    background: #01D8DA;

}

.option-input:checked {
    /* background: #40e0d0;  */
    background: #01D8DA;

}

.option-input:checked::before {
    height: 40px;
    width: 40px;
    position: absolute;
    content: '✔';
    display: inline-block;
    font-size: 26.66667px;
    text-align: center;
    line-height: 40px;
}

.option-input:checked::after {
    -webkit-animation: click-wave 0.65s;
    -moz-animation: click-wave 0.65s;
    animation: click-wave 0.65s;
    background: #40e0d0;
    content: '';
    display: block;
    position: relative;
    z-index: 100;
}

.option-input.radio {
    border-radius: 50%;
}

.option-input.radio::after {
    border-radius: 50%;
}


.select2-selection__rendered {
    display: block !important;
}

/* This clears selected options from the list */

.select2-results__option[aria-selected=true] {
    display: none;
}


.select2-container--open {
    z-index: 10000000000;
}

.file-preview-frame {
    width: 95%;
}

</style>