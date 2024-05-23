<style>
    .wrapper #stp_1_select_option-error {
        height: 3rem;
    }

    .wrapper .img-test-logo {
        height: 300px;
        width: 300px;
    }

    .wrapper .form_logo {
        left: 100px;
    }

    .wrapper .form_logo a img {
        width: 220px;
        height: 120px;
    }

    .wrapper .form_items .error+.error {
        height: 2rem;
        left: 33rem;

    }

    .wrapper .az-section {
        padding-right: 1rem;
    }

    .wrapper .multisteps_form {
        margin-right: 5rem;
    }

    @media only screen and (max-width: 768px) {
        .wrapper .form_logo {
            left: 11px;
        }
    }

    .wrapper .form_btn {
        padding-top: 2rem;
    }

    .wrapper .multisteps_form_panel {
        transition: opacity 0.5s ease-in-out;
    }

    .wrapper .az-time {
        display: none;
    }

    .wrapper .step_content span {
        color: #fe6300;
    }


    @media screen and (max-width: 1199.98px) {
        .multisteps_form {
            margin-right: 0;
        }

        .az-time {
            display: flex;
            /* position: relative !important; */
            margin-left: .8rem;
        }

        .az-section {
            /* padding-right: 0; */
        }


        .multisteps_form_panel {
            padding-top: 0rem;
        }

        .form_logo {
            margin-top: 0;
        }

        .prev_btn {
            font-size: 1rem;
        }

        .next_btn {
            font-size: 1rem;
        }

        .form_btn {
            padding-bottom: 1rem;
        }

        .form_items label {
            /* height: 12rem; */
            height: auto;
        }

        .form_items label:after {
            top: 11.7%;
            right: 5px;
        }

        input:checked+span.checked:after {
            top: 12.7%;
            right: 9px;
        }

        #nextBtn span {
            display: none;
        }

        #prevBtn span {
            display: none;
        }

        .question_title {
            padding-top: 0 !important;
            padding-bottom: 1rem !important;
        }

        .count_box {
            width: 20em;
            height: 2em;
            margin: 1rem auto;
        }

        .count_clock img {
            width: 1.8125rem;
        }

        .count_number {
            height: 0;
            padding: .8rem !important;
        }

        .count_number .text-uppercase {
            display: none;
        }

        .az-time .count_hours h3,
        .az-time .count_min h3,
        .az-time .count_sec h3 {
            margin-bottom: 0;
        }

        .form_items .error+.error {
            top: -62px;
            /* left: 54%; */
            left: 159%;
            text-transform: none;
        }

        .form_logo a img {
            display: none;
        }

        .az-row>:first-child {
            padding-right: 0 !important;
            padding-left: calc(var(--bs-gutter-x)* .5) !important;
        }

        .az-row>:last-child {
            padding-left: 0 !important;
            padding-right: calc(var(--bs-gutter-x)* .5) !important;
        }

        .step_box_icon img {
            max-width: 70%;
            width: 3rem;
            height: 3.3rem;
        }

        .form_items label:after {
            width: 1rem;
            height: 1rem;
        }

        input:checked+span.checked:after {
            top: 11.7%;
            right: 7.1px;
            font-size: 0.7rem;
        }

        .step_box_text {
            font-size: 1rem;
        }

        .step_content span {
            color: #fe6300;
        }

        .container-md-fluid {
            margin: 2rem 0;
        }
    }

    .wrapper .step_box_text {
        user-select: none;
    }

    /* .step_box_icon img {
        user-select: none !important;
    } */
</style>
