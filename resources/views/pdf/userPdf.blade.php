<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Marriage Card</title>
    {{-- <link rel="stylesheet" href="{{asset('pdfStyle.css')}}" /> --}}
    {{-- <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    /> --}}


<style>
    body {
    margin: 0;
    padding: 0;
}

.grey-background {
    background-color: #525252;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100vw;
    padding: 20px;
    box-sizing: border-box;
}

.blue-box {
    background-color: #007bff;
    border-radius: 8px;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 900px;
    height: 100%;
    box-sizing: border-box;
}

.white-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    width: 50%;
}

.center-image {
    max-width: 100%;
    height: auto;
    border-radius: 50%;
    margin-bottom: 20px;
}

.card-content {
    font-size: 16px;
    color: #333;
}

.card-content h2 {
    font-size: 24px;
    color: #007bff;
    margin-bottom: 10px;
}

.card-content p {
    margin: 10px 0;
}

.main {
    height: auto;
    width: 100%;
    padding: 20px 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.main_1 {
    /* background-image: url('{{ asset('/image/wert.jpg') }}'); */
    background-image: url('https://i.pinimg.com/originals/d6/fd/c8/d6fdc83f651e1c1460625cd25da61cd0.jpg');
    height: 1250px;
    width: 900px;
}

.img_container {
    display: flex;
    justify-content: flex-end;
}

.img_container img {
    width: 100px;
    margin: 40px 55px 0 0;
}

.second_one {
    background-color: white;
    height: 700px;
    width: 600px;
    margin: auto;
    margin-top: 7rem;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.second_one h1 {
    font-size: 4rem;
    font-weight: 800;
}

.second_one img {
    width: 200px;
    margin: -20px 0 0 5px;
}

.second_one .main_slogan {
    font-size: 20px;
    font-weight: bold;
}

.second_one .sub_slogan {
    font-size: 27px;
    font-weight: bold;
    color: #eb1e87;
    margin-top: -14px;
}

.third_one {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    color: white;
    margin-bottom: 2rem;
}

.details_1 {
    line-height: 10px;
}

.details_1 h1 {
    color: #eb1e87;
    margin-bottom: 2rem;
}

.details_1 p {
    font-size: 18px;
    font-weight: bold;
}

.details_2 {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.details_2 img {
    width: 100px;
}

.footer {
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
}

.main_2 {
    background-color: white;
    height: auto;
    margin: 0 40px 40px 40px;
    padding: 4px 14px;
    border-radius: 10px;
}

.container_1 {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 2rem;
    padding-left: 15px;
}

.container_1 img {
    width: 200px;
}

.container_1 p {
    font-weight: bold;
    font-size: 1.2rem;
    line-height: 1.6rem;
}

.container_2 h1 {
    font-size: 1.5rem;
    text-align: center;
}

.container_2 li {
    margin-bottom: 1.5rem;
}

.container_2 .points li {
    font-size: 1.2rem;
}

.endPara p {
    font-weight: bold;
    font-size: 1.2rem;
    line-height: 1.6rem;
}

.footer {
    margin-top: -34px;
}

.contain {
    display: flex;
    justify-content: space-between;
    margin-bottom: 3.2rem;
    gap: 5rem;
}

.choose {
    margin: 5rem 0 0 6.3rem;
}

.main_1 .choose h1 {
    font-size: 4rem;
    color: white;
}

.left {
    padding-left: 50px;
}

.left p {
    color: white;
    font-size: 1.7rem;
    word-spacing: 5px;
    line-height: 1.9rem;
    margin-top: 4.4rem;
}

.right img {
    width: 300px;
    border-radius: 10px 0 0 10px;
}

.contain .share {
    font-size: 24px;
    color: #eb1e87;
    font-weight: bold;
}

.contain .qr img {
    width: 100px;
    margin: -10px 0 0 25px;
}

.middle {
    display: flex;
    background-color: #3124a7;
    width: 90%;
    margin: 10px auto;
}

.main-2 {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1rem 1rem;
    gap: 1rem;
}

.main-2-left {
    width: 45%;
    background-color: white;
    padding: 0;
    margin: 0;
}

.bio {
    background-color: #eb1e87;
    margin-top: -1.4rem;
    height: 6.5rem;
    color: white;
}

.bio h1 {
    font-size: 1.8rem;
    text-align: center;
    margin-bottom: -1.6rem;
}

.bio p {
    font-size: 2.4rem;
    text-align: center;
    font-family: cursive;
}

.main-2-right {
    color: white;
    width: 45%;
}

.main-2-right img {
    width: 262px;
    border-radius: 10px;
}

.family {
    padding: 1.1rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    margin-bottom: -3rem;
}

.family h1 {
    font-size: 1.7rem;
    color: #eb1e87;
    font-weight: 1000;
    margin-bottom: -1px;
    font-family: serif;
}

.family hr {
    width: 80%;
    height: 5px;
    border-radius: 6px;
    background-color: #eb1e87;
    margin-left: 0px;
    margin-bottom: 1.5rem;
}

.family p {
    font-size: 19px;
    font-weight: bold;
    margin-top: -10px;
}

.family p span {
    font-weight: 100;
}

.last_family {
    margin-bottom: 0px;
}

.partner {
    margin: -6px 0;
}

.contain-2 {
    position: relative;
    margin-bottom: 4rem;
}

.connect {
    width: 100%;
    background-color: rgb(241, 208, 57);
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: -2rem;
    z-index: 100;
}

.connect h1 {
    text-align: center;
}

.partner p {
    font-size: 17px;
    line-height: 1.5rem;
}

.container_3 {
    margin-top: 20rem;
}

.brand {
    display: flex;
    justify-content: center;
    gap: -1rem;
}

.left_details {
    padding: 1.6rem 0 0 2rem;
    width: 75%;
}

.left_details h1 {
    font-size: 2.7rem;
    margin-bottom: 2.5rem;
}

.left_details p {
    margin-left: 1rem;
    color: white;
    font-size: 1.4rem;
    font-weight: normal;
}

.right_logo {
    padding: 1.6rem 0 0 2rem;
    width: 25%;
}

.right_logo img {
    width: 180px;
    border-radius: 10px 0 0 10px;
    margin-left: 2.8rem;
}

.profile-card {
    position: relative;
    padding: 0 1rem 0 2rem;
    margin: 1rem;
}

.profile-image img {
    width: 150px;
    position: absolute;
    left: 1rem;
    top: 1.6rem;
    z-index: 99;
    border-radius: 10px;
}

.profile-details {
    background: linear-gradient(to right, #dff0d8, #d0e8f2);
    padding: 0 1rem 1.7rem 1rem;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 1rem;
    margin-left: 5.4rem;
    position: relative;
}

.profile-details p {
    margin-bottom: -10px;
}

.bottom_logo img {
    width: 60px;
}

.bottom_logo {
    position: absolute;
    bottom: 0.5rem;
    right: 1.2rem;
}

.bottom_logo img {
    border-radius: 10px;
    opacity: 30%;
}

.profile_footer {
    margin-top: -10px;
}

.header_img img {
    width: 200px;
    margin: 2rem 0 0 0;
    border-radius: 0 10px 10px 0;
}

.thanks {
    padding-left: 30px;
}

.thanks h1 {
    font-size: 3.5rem;
    color: #eb1e87;
}

.thanks h1 span {
    font-size: 2rem;
    color: white;
}

.points_2 {
    padding-left: 30px;
    margin-top: -2rem;
}

.points_2 h1 {
    font-size: 2.7rem;
    color: #eb1e87;
}

.points_2 ul {
    margin-top: -1.5rem;
    font-size: 1.3rem;
    color: white;
}

.contact {
    display: flex;
    justify-content: space-around;
    align-items: center;
    gap: -2rem;
}

.contact .left_side h1 {
    font-size: 2rem;
    color: #eb1e87;
    line-height: 1.8rem;
}

.contact .left_side h1 span {
    font-size: 1.5rem;
    color: white;
    font-weight: 600;
}

.contact .left_side p {
    font-size: 1.3rem;
    color: white;
    margin-bottom: -1rem;
}

.right_side {
    margin-right: 2rem;
}

.right_side h1 {
    color: #eb1e87;
    font-weight: 800;
}

.last {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 3rem;
    margin: 1.7rem 0 3rem 0;
}

.left_footer {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.left_footer h1 {
    font-size: 2rem;
    color: red;
}

.left_footer h1 span {
    color: white;
    font-size: 1.2rem;
    font-weight: 100;
}

.footer_image1 img {
    width: 120px;
}

.right_footer {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-top: 2rem;
}

.right_footer h1 {
    color: white;
    font-size: 1.2rem;
}

.right_footer img {
    width: 120px;
}

</style>



  </head>
  <body>


    <!--  template - 1  -->
    <div class="main">
        <div class="main_1">
        <div class="first_one">
            <div class="img_container"><img src="#" alt=""></div>
        </div>
        <div class="second_one">
            <h1>WELCOME</h1>
            <img src="#" alt="">
            <p class="main_slogan">👏 हमारा उद्देश्य जैन समुदा य की सेवा करना का है। 👏</p>
            <p class="sub_slogan">जैन का विवाह जैन से ही हो ।</p>
        </div>
        <div class="third_one">
            <div class="details_1">
                <h1>Contact Us</h1>
                <p>📞+91 8454849788 / +91 9425479654</p>
                <p>✉️ shreevct@gmail.com</p>
                <p>🌍www.shreevct.com</p>
                <p>📍Shree Manibhadra Gol Bhulding Mewanagar Nakoda (RJ)</p>
            </div>
            <div  class="details_2">
                <p>Share with your friends</p>
                <img src="#" alt="">
            </div>
        </div>
        <div class="footer">
            <p>Copyright © 2024 vct. All rights reserved.</p>
        </div>
    </div>
    </div>

    <!-- template - 2 -->
    <div class="main">
      <div class="main_1">
        <div class="main_2">
          <div class="container_1">
            <div class="logo"><img src="#" alt="" /></div>
            <div class="des">
              <p>
                Welcome to VCT E-Patrika, your trusted platform for finding the
                perfect Jain life partner. Welcome to VCT E-Patrika, your
                trusted platform for finding the perfect life partner. We
                understand that the journey to finding a compatible life partner
                can be daunting and time-consuming, which is why we have created
                a centralized hub where eligible bachelors and bachelorettes can
                showcase their biodata and connect with potential matches within
                the community. We recognize that finding a soulmate goes beyond
                just matching biodata; it's about creating meaningful
                relationships that last a lifetime.
              </p>
            </div>
          </div>
          <div class="container_2">
            <div class="heading">
              <h1>Key Features of VCT E-Patrika</h1>
            </div>
            <div class="points">
              <ul>
                <li>
                  Extensive Biodata Profiles: We offer a comprehensive platform
                  for creating detailed and personalized biodata profiles. Our
                  easy-to-use interface allows you to showcase your personal
                  information, education, occupation, family background,
                  interests, and more. This helps potential matches gain a
                  deeper understanding of your personality and compatibility. We
                  encourage you to share your life experiences, hobbies, and
                  aspirations, allowing potential matches to connect with the
                  real you.
                </li>
                <li>
                  Advanced Search Filters: Our advanced search filters enable
                  you to customize your search based on specific criteria, such
                  as age, religion, caste, education, and location. This saves
                  time and helps you focus on profiles that align with your
                  preferences and requirements.
                </li>
                <li>
                  Privacy and Security: We prioritize the privacy and security
                  of our users. All profiles and personal information are
                  protected, and we ensure that only registered and verified
                  members have access to the biodata database. We also provide
                  options to control the visibility of personal details and
                  photos, allowing you to maintain your privacy while engaging
                  in the matchmaking process.
                </li>
                <li>
                  Dedicated Customer Support: Our dedicated customer support
                  team is always available to assist you with any queries or
                  concerns. We strive to provide prompt and personalized
                  assistance, ensuring a smooth and hassle-free experience on
                  our platform.
                </li>
                <li>
                  Thoughtful Matchmaking: We go beyond basic search filters and
                  algorithms. Our team understands the nuances of matchmaking
                  and takes a personalized approach to suggest potential matches
                  based on compatibility, interests, and shared values. We
                  believe that compatibility is more than just a checklist of
                  criteria, and we strive to find connections that have the
                  potential to grow into lifelong partnerships.
                </li>
                <li>
                  Community Building: We believe in the power of community.
                  Through our platform, you can connect with like-minded
                  individuals that will enable meaningful interactions and
                  facilitate a deeper understanding of potential matches and
                  foster a supportive environment for individuals on their
                  journey to finding love
                </li>
              </ul>
            </div>
            <div class="endPara">
              <p>
                At VCT E-Patrika, we aim to redefine the way individuals find
                their life partners. We believe that every person has a unique
                story to tell, and we are dedicated to helping you find a life
                partner who appreciates and cherishes that story. Join us today
                and let us help you embark on the beautiful journey of finding
                your soulmate.
              </p>
            </div>
          </div>
        </div>
        <div class="footer">
            <p>Copyright © 2024 vct. All rights reserved.</p>
        </div>
      </div>
    </div>
-
    <!-- template - 3 -->
    <div class="main">
      <div class="main_1">
        <div class="choose">
          <h1>
            Why <br />
            Choose Us
          </h1>
        </div>
        <div class="contain">
          <div class="left">
            <p>
              At VCT E-Patrika, we go beyond traditional matchmaking platforms
              by placing a strong emphasis on fostering genuine human
              connections. We understand that finding a life partner means
              discovering someone who truly understands and complements you. Our
              dedicated team verifies each profile to ensure authenticity and
              maintains a secure environment for your search. With our
              user-friendly interface, personalized matchmaking, and extensive
              database of eligible individuals, we strive to provide you with
              meaningful connections that have the potential to flourish into
              lifelong relationships. Join us and become part of a community
              that values the human aspect of finding love, because we believe
              that the right connection can change your life forever.
            </p>
            <p class="share">Share with friends</p>
            <div class="qr"><img src="#" alt=""></div>
          </div>
          <div class="right">
            <img src="#" alt="">
          </div>
        </div>
        <div class="footer">
            <p>Copyright © 2024 vct. All rights reserved.</p>
        </div>
      </div>

    </div>

    <!-- template - 4 -->
    <div class="main mainly">
      <div class="main_1">
        <div class="contain-2">
          <div class="middle">
            <div class="main-2">
              <div class="main-2-left">
                <div class="bio">
                  <h1>BIO-DATA</h1>
                  <p>Shikha Sharma</p>
                </div>
                <div class="family">
                  <h1>Family Details -</h1>
                  <hr />
                  <p>Father Name: <span>abcd</span></p>
                  <p>Father Occupation: <span>Job or Service</span></p>
                  <p>Mother Name: <span>abcd</span></p>
                  <p>Mother Occupation:<span>abcd</span></p>
                  <p>Brother: <span>1 (Married: 0, UnMarried: 1)</span></p>
                  <p>Sister: <span>1 (Married: 0, UnMarried: 1)</span></p>
                  <p>
                    Family Address:
                    <span>123 Lorem Ipsum is simply dummy </span>
                  </p>
                  <p>Gotra: <span>Khajanchi</span></p>
                  <p>Native Place: <span>Ranchi (JH) </span></p>
                </div>
                <div class="family">
                  <h1>Caste Details -</h1>
                  <hr />
                  <p>Caste Details: <span>Jain</span></p>
                  <p>Community: <span>abcd</span></p>
                  <p>Sampradaya: <span>Marwadi</span></p>
                </div>
                <div class="family last_family">
                  <h1>Partner Details -</h1>
                  <hr />
                  <p>Age Group: <span>24 - 28</span></p>
                  <p>Income: <span>Any</span></p>
                  <p>Country: <span>India</span></p>
                  <p>State:<span>Any</span></p>
                  <p>City: <span>3</span></p>
                  <p>Education: <span>Graduate</span></p>
                  <p>Occupation: <span>Job or Service</span></p>
                  <p>Profession: <span>Any </span></p>
                  <p>Marital Status: <span>Never Married</span></p>
                  <p>Astrology Matching: <span>No</span></p>
                </div>
              </div>
              <div class="main-2-right">
                <div class="img-1">
                  <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="" />
                </div>
                <div class="family partner last_family">
                  <h1>Partner Details -</h1>
                  <hr />
                  <p>DOB: <span>24 - 28</span></p>
                  <p>Birthtime: <span>Any</span></p>
                  <p>Birthplace: <span>India</span></p>
                  <p>Blood Group:<span>Any</span></p>
                  <p>Height: <span>3</span></p>
                  <p>Weight: <span>Graduate</span></p>
                  <p>Complexion: <span>Job or Service</span></p>
                  <p>Disability: <span>Any </span></p>
                  <p>Marital Status: <span>Never Married</span></p>
                  <p>Education: <span>MD</span></p>
                  <p>Occupation: <span>Job or Service </span></p>
                  <p>Annual Income: <span>INR 15 Lakh to 20 Lakh</span></p>
                  <p>
                    Candidate address:
                    <span
                      >123 Lorem Ipsum is <br />
                      simply dummy text of</span
                    >
                  </p>
                </div>
                <div class="img-2">
                  <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="connect">
            <h1>Connect VCT by Calling 8454849788 / 9425479654.</h1>
          </div>


        </div>
        <div class="footer">
          <p>Copyright © 2024 vct. All rights reserved.</p>
        </div>
      </div>
    </div>

    <!-- template - 5 -->

    <div class="main">
      <div class="main_1 ">
        <div class="brand">
          <div class="left_details">
            <div class="details_1">
              <h1>Vardhaman Charitable Trust</h1>
              <p>📞+91 8454849788 / +91 9425479654</p>
              <p>✉️ shreevct@gmail.com</p>
              <p>🌍www.shreevct.com</p>
              <p>📍Shree Manibhadra Gol Bhulding Mewanagar Nakoda (RJ)</p>
            </div>
          </div>
          <div class="right_logo">
            <img src="#" alt="" />
          </div>
        </div>

        <div class="profile-card">
          <div class="profile-image">
            <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="Shikha Sherma" />
          </div>
          <div class="profile-details">
            <div class="details-left">
              <p><strong>Name:</strong> Shikha Sherma</p>
              <p><strong>Date Of Birth:</strong> 01/03/1998</p>
              <p><strong>BirthTime:</strong> 7:30AM</p>
              <p><strong>Birthplace:</strong> Indore</p>
              <p><strong>Height:</strong> 5.2"</p>
              <p><strong>Weight:</strong> 52kg</p>
              <p><strong>Complexion:</strong> abc</p>
              <p><strong>Education:</strong> MBA</p>
            </div>
            <div class="details-right">
              <p><strong>Profession:</strong> Not Working</p>
              <p><strong>Mangalik:</strong> NO</p>
              <p><strong>Marital status:</strong> Never Married</p>
              <p><strong>Physical Status:</strong> Fit</p>
              <p><strong>Father Name:</strong> Yash Sherma</p>
              <p><strong>Profession:</strong> Private Job</p>
              <p><strong>Mother Name:</strong> Jaya Sherma</p>
              <p><strong>Profession:</strong> House Wife</p>
            </div>
            <div class="additional-details">
              <p><strong>Siblings Details:</strong> 3</p>
              <p><strong>Community:</strong> xyz</p>
              <p><strong>Whatsapp Number:</strong> xxxxxxxxxx</p>
              <p><strong>Calling Number:</strong> xxxxxxxxxx</p>
              <p>
                <strong>Address:</strong> 123 vijay nagar, Indore, <br />m.p.
                452010
              </p>
            </div>
            <div class="bottom_logo">
              <img src="#" alt="VCT Logo" />
            </div>
          </div>
        </div>
        <div class="profile-card">
          <div class="profile-image">
            <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="Shikha Sherma" />
          </div>
          <div class="profile-details">
            <div class="details-left">
              <p><strong>Name:</strong> Shikha Sherma</p>
              <p><strong>Date Of Birth:</strong> 01/03/1998</p>
              <p><strong>BirthTime:</strong> 7:30AM</p>
              <p><strong>Birthplace:</strong> Indore</p>
              <p><strong>Height:</strong> 5.2"</p>
              <p><strong>Weight:</strong> 52kg</p>
              <p><strong>Complexion:</strong> abc</p>
              <p><strong>Education:</strong> MBA</p>
            </div>
            <div class="details-right">
              <p><strong>Profession:</strong> Not Working</p>
              <p><strong>Mangalik:</strong> NO</p>
              <p><strong>Marital status:</strong> Never Married</p>
              <p><strong>Physical Status:</strong> Fit</p>
              <p><strong>Father Name:</strong> Yash Sherma</p>
              <p><strong>Profession:</strong> Private Job</p>
              <p><strong>Mother Name:</strong> Jaya Sherma</p>
              <p><strong>Profession:</strong> House Wife</p>
            </div>
            <div class="additional-details">
              <p><strong>Siblings Details:</strong> 3</p>
              <p><strong>Community:</strong> xyz</p>
              <p><strong>Whatsapp Number:</strong> xxxxxxxxxx</p>
              <p><strong>Calling Number:</strong> xxxxxxxxxx</p>
              <p>
                <strong>Address:</strong> 123 vijay nagar, Indore, <br />m.p.
                452010
              </p>
            </div>
            <div class="bottom_logo">
              <img src="#" alt="VCT Logo" />
            </div>
          </div>
        </div>
        <div class="profile-card">
          <div class="profile-image">
            <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="Shikha Sherma" />
          </div>
          <div class="profile-details">
            <div class="details-left">
              <p><strong>Name:</strong> Shikha Sherma</p>
              <p><strong>Date Of Birth:</strong> 01/03/1998</p>
              <p><strong>BirthTime:</strong> 7:30AM</p>
              <p><strong>Birthplace:</strong> Indore</p>
              <p><strong>Height:</strong> 5.2"</p>
              <p><strong>Weight:</strong> 52kg</p>
              <p><strong>Complexion:</strong> abc</p>
              <p><strong>Education:</strong> MBA</p>
            </div>
            <div class="details-right">
              <p><strong>Profession:</strong> Not Working</p>
              <p><strong>Mangalik:</strong> NO</p>
              <p><strong>Marital status:</strong> Never Married</p>
              <p><strong>Physical Status:</strong> Fit</p>
              <p><strong>Father Name:</strong> Yash Sherma</p>
              <p><strong>Profession:</strong> Private Job</p>
              <p><strong>Mother Name:</strong> Jaya Sherma</p>
              <p><strong>Profession:</strong> House Wife</p>
            </div>
            <div class="additional-details">
              <p><strong>Siblings Details:</strong> 3</p>
              <p><strong>Community:</strong> xyz</p>
              <p><strong>Whatsapp Number:</strong> xxxxxxxxxx</p>
              <p><strong>Calling Number:</strong> xxxxxxxxxx</p>
              <p>
                <strong>Address:</strong> 123 vijay nagar, Indore, <br />m.p.
                452010
              </p>
            </div>
            <div class="bottom_logo">
              <img src="#" alt="VCT Logo" />
            </div>
          </div>
        </div>
        <div class="profile-card">
          <div class="profile-image">
            <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="Shikha Sherma" />
          </div>
          <div class="profile-details">
            <div class="details-left">
              <p><strong>Name:</strong> Shikha Sherma</p>
              <p><strong>Date Of Birth:</strong> 01/03/1998</p>
              <p><strong>BirthTime:</strong> 7:30AM</p>
              <p><strong>Birthplace:</strong> Indore</p>
              <p><strong>Height:</strong> 5.2"</p>
              <p><strong>Weight:</strong> 52kg</p>
              <p><strong>Complexion:</strong> abc</p>
              <p><strong>Education:</strong> MBA</p>
            </div>
            <div class="details-right">
              <p><strong>Profession:</strong> Not Working</p>
              <p><strong>Mangalik:</strong> NO</p>
              <p><strong>Marital status:</strong> Never Married</p>
              <p><strong>Physical Status:</strong> Fit</p>
              <p><strong>Father Name:</strong> Yash Sherma</p>
              <p><strong>Profession:</strong> Private Job</p>
              <p><strong>Mother Name:</strong> Jaya Sherma</p>
              <p><strong>Profession:</strong> House Wife</p>
            </div>
            <div class="additional-details">
              <p><strong>Siblings Details:</strong> 3</p>
              <p><strong>Community:</strong> xyz</p>
              <p><strong>Whatsapp Number:</strong> xxxxxxxxxx</p>
              <p><strong>Calling Number:</strong> xxxxxxxxxx</p>
              <p>
                <strong>Address:</strong> 123 vijay nagar, Indore, <br />m.p.
                452010
              </p>
            </div>
            <div class="bottom_logo">
              <img src="#" alt="VCT Logo" />
            </div>
          </div>
        </div>

        <div class="footer profile_footer">
          <p>Copyright © 2024 vct. All rights reserved.</p>
        </div>
      </div>
    </div>

    <!-- template - 6 -->

    <div class="main">
      <div class="main_1">
        <div class="header_img">
          <img src="#" alt="" />
        </div>
        <div class="thanks">
          <h1>
            Thank you! <br />
            <span> Hope you are interested! </span>
          </h1>
        </div>
        <div class="points_2">
          <h1>VCT Seva:</h1>
          <ul>
            <li>Samaj Kalyan Seva.</li>
            <li>PR Business.</li>
            <li>Goshala Seva.</li>
            <li>Birds & Animal Seva.</li>
            <li>Animal Ambulance Seva.</li>
            <li>Patshala & Education Seva.</li>
            <li>VCT Parichay Sammelan Event.</li>
            <li>Samudayik Vivah Sammelan.</li>
          </ul>
        </div>

        <div class="contact">
          <div class="left_side">
            <h1>
              Contact Me: <br>
              <span> Vardhaman Charitable Trust</span>
            </h1>
            <p>📞  +91 8454849788 / +91 9425479654</p>
            <p>✉️  Shreevct@gmail.com</p>
            <p>🌍  www.shreevct.com</p>
            <p>📍  Shree Manibhadra Gol Bhulding <br> Mewanagar Nakoda (RJ)</p>
          </div>
          <div class="right_side">
            <h1>Follow Us On:</h1>
            <div><i class="fa-brands fa-2xl fa-instagram"></i>&emsp;<i class="fa-brands fa-2xl fa-facebook"></i>&emsp;<i class="fa-brands fa-2xl fa-telegram"></i>&emsp;<i class="fa-brands fa-2xl fa-whatsapp"></i>&emsp;</div>
          </div>
        </div>
        <div class="last">
          <div class="left_footer">
            <h1>Powered By: <br>
             <span> Vardhaman Charitable Trust</span></h1>
             <div class="footer_image1">
              <img src="#" alt="">
             </div>
          </div>
          <div class="right_footer">
            <h1>Share with friends</h1>
            <div><img src="#" alt=""></div>
          </div>
        </div>
        <div class="footer">
          <p>Copyright © 2024 vct. All rights reserved.</p>
      </div>
      </div>
    </div>
  </body>
</html>
