<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jain E-Patrika PDF</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Page layout */
        body {
            font-family: Arial, sans-serif;
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            margin: 1cm auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background-color: #080A52;
            color: #fff;
        }

        /* Common styles */
        section {
            margin-bottom: 1cm;
            padding: 1cm;
            border-radius: 5px;
        }

        section h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 0.5cm;
            color: #EB2188;
        }

        section p {
            font-size: 16px;
            line-height: 1.3;
            margin-bottom: 0.5cm;
        }

        /* Header */
        header {
            text-align: center;
            margin-bottom: 1cm;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 0.2cm;
            color: #EB2188;
        }

        header p {
            font-size: 14px;
            margin-bottom: 0.2cm;
        }

        .header-text {
            padding: 0 1cm;
        }

        .logo img {
            width: 70px;
            height: auto;
        }

        /* Biodata Card */
        .biodata-card {
            /* background-color: #EB2188; */
            /* color: #fff; */
            color: #121111;
            padding: 1cm;
            border-radius: 10px;
            margin-bottom: 1cm;
            display: flex;
            flex-wrap: wrap;
        }

        .biodata-card .row {
            display: flex;
            flex-wrap: nowrap;
            margin: -0.5cm;
        }

        .biodata-card .col {
            flex: 1;
            padding: 0.5cm;
            text-align: left;
        }

        .biodata-card .col img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
            margin-bottom: 0.5cm;
        }

        .biodata-card .col h3 {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 0.5cm;
        }

        .biodata-card .col p {
            font-size: 10px;
            line-height: 1.0;
            margin-bottom: 0.5cm;
        }

        /* Footer */
        footer {
            text-align: center;
            font-size: 12px;
            color: #EB2188;
        }

        /* Background Images */
        .welcome-page,
        .thank-you-page {
            background-size: cover;
            background-position: center;
            border-radius: 10px;
             color: #fff;
            padding: 2cm;
        }

        .welcome-page {
            background-image: url('https://cdn0.weddingwire.in/article/5678/3_2/960/jpg/8765-choosing-gifts-for-a-newly-married-couple-slawa-walczak-photography.jpeg');
            /* Replace with actual background image URL */
        }

        /* .thank-you-page {
            background-image: url('https://images.shaadisaga.com/shaadisaga_production/photos/pictures/000/731/769/new_medium/israni.jpg?1551169551'); /* Replace with actual background image URL */
        /* } */

        /* Responsive Styles */
        @media (max-width: 768px) {
            body {
                width: auto;
                margin: 1cm;
                padding: 1cm;
            }

            header {
                flex-direction: column;
                align-items: center;
            }

            header .logo {
                margin-bottom: 1cm;
            }

            .biodata-card .row {
                flex-wrap: wrap;
            }

            .biodata-card .col {
                flex: 0 0 100%;
                margin-bottom: 1cm;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="header-text">
            <h1>Jain E-Patrika</h1>
            <p>Rishtey hi Rishtey</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
        </div>
        <div class="logo">
            <!-- <img src="logo.jpg" alt="Logo"> --> <!-- Replace with actual logo URL -->
            <img src="https://play-lh.googleusercontent.com/vnu3MlMxPJgIszWe-reORQPOUtZsFKTNYunXGHdPF_N0bJe_3J-tPlgsJ7Zym9vTnyg"
                alt="">
        </div>
    </header>

    <main>
        <!-- Welcome Page -->
        <section class="welcome-page">
            <!-- No text, only background image -->
        </section>

        <!-- About Page -->
        <section>
            <h2>About Us</h2>
            <p>Welcome to Jain E-Patrika, your trusted platform for finding the perfect life partner. We understand that
                the journey to finding a compatible life partner can be daunting and time-consuming, which is why we
                have created a centralized hub where eligible bachelors and bachelorettes can showcase their biodata and
                connect with potential matches within the community. We recognize that finding a soulmate goes beyond
                just matching biodata; it's about creating meaningful relationships that last a lifetime... </p>
        </section>

        <!-- Why Choose Us -->
        <section>
            <h2>Why Choose Us</h2>
            <img src="https://images.pexels.com/photos/6685151/pexels-photo-6685151.jpeg?cs=srgb&dl=pexels-skgphotography-6685151.jpg&fm=jpg"
                alt="Why Choose Us" style="width: 100%;">
            <p>At Jain E-Patrika, we go beyond traditional matchmaking platforms by placing a strong emphasis on
                fostering genuine human connections. We understand that finding a life partner means discovering someone
                who truly understands and complements you. Our dedicated team verifies each profile to ensure
                authenticity and maintains a secure environment for your search. With our user-friendly interface,
                personalized matchmaking, and extensive database of eligible individuals, we strive to provide you with
                meaningful connections that have the potential to flourish into lifelong relationships. Join us and
                become part of a community that values the human aspect of finding love, because we believe that the
                right connection can change your life forever.</p>
        </section>

        <!-- User Biodata -->
        <section>
            <h2>Biodata</h2>


            @php
            function generateRandomGradient()
            {
                // Generate random RGB values for each color component
                $color1 = 'rgb(' . mt_rand(0, 255) . ', ' . mt_rand(0, 255) . ', ' . mt_rand(0, 255) . ')';
                $color2 = 'rgb(' . mt_rand(0, 255) . ', ' . mt_rand(0, 255) . ', ' . mt_rand(0, 255) . ')';

                // Generate the CSS gradient string
                $gradient = "linear-gradient(45deg, $color1, $color2)";

                return $gradient;
            }
            @endphp


            @foreach ($usersDetails as $user)
                {{-- @php
                    $colorArr = ['red', 'blue', 'pink', 'yellow'];
                    $randomColor = $colorArr[array_rand($colorArr)];
                @endphp --}}

                {{-- <div class="biodata-card" style="background-color: {{ $randomColor }};"> --}}

                @php
                    $randomGradient = generateRandomGradient();
                @endphp
                <div class="biodata-card" style="background: {{ $randomGradient }};">

                    <div class="row">
                        <div class="col">
                            <img src="https://p7.hiclipart.com/preview/81/570/423/computer-icons-user-clip-art-user.jpg"
                                alt="User 1">
                        </div>
                        <div class="col">
                            <h3>{{ $user->name ?? null }}</h3>
                            <p><b>Age:</b> {{ $user->age ?? null }}</p>
                            <p><b>Education:</b> {{ $user->education ?? null }}</p>
                            <p><b>Profession:</b> {{ $user->profession ?? null }}</p>
                            <p><b>Marital Status:</b> {{ $user->marital_status ?? null }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h3>Personal Details</h3>
                            <p>Date of Birth:{{ $user->dob ?? null }}</p>
                            <p>Height: {{ $user->height ?? null }}</p>
                            <p>Weight: {{ $user->weight ?? null }}</p>
                            <p>Complexion: {{ $user->complexion ?? null }}</p>
                        </div>
                        <div class="col">
                            <h3>Family Details</h3>
                            <p>Father: {{ $user->userDetail->father_name ?? null }}</p>
                            <p>Father's Profession: {{ $user->userDetail->father_profession ?? null }}</p>
                            <p>Mother: {{ $user->userDetail->mother_name }}</p>
                            <p>Mother's Profession: {{ $user->userDetail->mother_profession ?? null }}</p>
                            <p>Brother: {{ $user->userDetail->brother ?? null }}</p>
                            <p>Sister: {{ $user->userDetail->sister ?? null }}</p>
                        </div>
                    </div>
                </div>
            @endforeach



        </section>

        <!-- Thank You Page -->
        <section class="thank-you-page">
            <div class="thank-you-text">
                <p>Thank You for choosing Jain E-Patrika!</p>
                <p>Start your journey with us today! Contact us at:</p>
                <p>Phone: xxx-xxx-xxxx</p>
                <p>Website: www.jainepatrika.com</p>
                <p>Email: jainepatrika@gmail.com</p>
                <p>Address: 7, Address Chudi Bakhal Near Bus Stand, Dewas, M.P. 123456</p>
            </div>
            <div class="logo">
                <img src="https://play-lh.googleusercontent.com/vnu3MlMxPJgIszWe-reORQPOUtZsFKTNYunXGHdPF_N0bJe_3J-tPlgsJ7Zym9vTnyg"
                    alt="">
            </div>
        </section>
    </main>

    <footer>
        <p>Rishtey hi Rishtey</p>
    </footer>
</body>

</html>
