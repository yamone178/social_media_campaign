<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <?php 
  session_start();
  $email=$_SESSION['email'];

  if (!isset($email)) {
    header("location:notFound.php");
  }

  ?>
  <nav>
      <ul>
        <li class="link"><a href="home.php">Home</a></li>
        <li class="link"><a href="information.php">Information</a></li>
        <li>
          Campaigns
          <ul>
            <li class="link">
              <a href="popular-apps.php">Popular Apps</a>
            </li>
            <li class="link">
              <a href="parents-help.php">Parents Help</a>
            </li>
            <li class="link">
              <a href="livestreaming.php">Livestreaming</a>
            </li>
          </ul>
        </li>

        <li class="link"><a href="contact.php">Contact</a></li>
        <li class="link"><a href="legislation.php">Legislation</a></li>
        
      </ul>
      <div>
         <a class="btn btn-light d-flex align-center" href="logout.php">
         <svg class=" mr-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg>
            Logout
          </a>
      </div>
    </nav>
    <header class="mt-30">
    <form action="/search" class="d-flex justify-center align-center search-form" method="get">
          <div>
          <img src="./images/search.png" class=" mr-20" alt="" width="20px"> 

          </div> 
          <input
            type="text"
            id="search"
            name="search"
            placeholder="Search..."
            class="search mr-20"
          />
          <button type="submit" class=" search-btn btn btn-dark  ">
                Search
          </button>
        </form>
    </header>

    <div class="page-container">
    <main>
      <section class="legislation">

       
        <div class="container justify-center align-end">
            <div class="col-60 d-flex justify-center">
              
              <div class="legi-content">
                  <h2 class="legi-title">Stay Safe & Informed: Social Media Legislation & Best Practices</h2>
                    
                    <img src="./images/img-4.jpg" alt="">
              </div>
               
            </div>
            <div class="col-2">
              <div class="legi-text">
                  <p>Legislation provides a framework, but responsible online behavior goes beyond legal boundaries. This section explores best practices to cultivate a positive and safe social media experience:</p>
                  <ul>
                    <li> Learn how to manage your privacy settings and protect your online identity.</li>
                    <li>Explore strategies for fostering positive online interactions and avoiding cyberbullying.</li>
                    <li> Gain insights on identifying credible sources and avoiding the spread of false information.</li>
                    <li>Discover tips for promoting healthy social media habits and maintaining a balanced online presence.</li>
                  </ul>
              </div>
            </div>
        </div>

        <div class="section-divider"></div>

        <div class="container align-center">
           <div class="col-2">
              <div class="legi-sec2-text">
                <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, quis!</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A consequuntur explicabo aspernatur, nesciunt suscipit reprehenderit vero eius autem quisquam similique rem, exercitationem officia excepturi delectus amet unde. Doloremque, esse ipsa?</p>
              </div>
           </div>
           <div class="col-2 d-flex justify-center">
              <div class="legi-sec2-img">
                  <img src="./images/img-12.jpg"  alt="">
              </div>
              <div class="legi-sec2-img">
                  <img src="./images/img-7.jpg" alt="">
              </div>
           </div>
        </div>

       
      </section>
    </main>
   <div class="section-divider"></div>
    <footer>
        <div class="footer-container">
          <div class=" col-40">
              <div class="footer-text">
              <h3 class="footer-title">SafeTeen Online</h3>
               <p>"Empowering teenagers with the knowledge and tools to navigate social media safely is our commitment at SafeTeen Online"</p>
              </div>
          </div>
          <br>
          <br>
          <hr>
              <div class="container justify-between">
                 
                      <ul class="footer-ul">
                        <li class="footer-sub-title">Quick Link</li>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="information.php">Information</a>
                        </li>
                        <li>
                            <a href="legislation.php">legislation</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                      </ul>


                      <ul class="footer-ul">
                        <li class="footer-sub-title">Quick Link</li>
                        <li>
                            <a href="popular-apps.php">Popular Apps</a>
                        </li>
                        <li>
                            <a href="parents-help.php">Parents Help</a>
                        </li>
                        <li>
                            <a href="livestreaming.php">Live Streaming</a>
                        </li>
                      </ul>

                
                
               

                   <ul class="footer-contact">
                        <li class="footer-sub-title">Contact us</li>
                        <li class="link2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                      </svg>
                      +(21) 255 999 8888
                        </li>
                        <li class="link2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                        </svg>
                        safeteen12@gmail.com
                        </li>
                   </ul>
               
              </div>

           

        

        </div>

       <br> <br>
       <hr>

        <br><br>
        <div class="container">
          <div class="ft-1">
            <h4>Copyright &copy 2024 by safeteenonline  All Rights Reserved</h4>
          </div>
        <div class=" ft-2">
        <div class="container justify-right">
            <div class="footer-link">
                <a href="#" class="">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                  </svg>                  
                    <span>Facebook</span>
                </a>
            </div>

            <div class="footer-link">
                <a href="#" class="">
                <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-youtube" viewBox="0 0 16 16">
                  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
                </svg>                  
                  <span>Youtube</span>
                </a>
            </div>

            <div class="footer-link">
                <a href="#" class="">
                <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                  </svg>                  
                  <span>instagram</span>
                </a>
            </div>

            <div class="footer-link">
                <a href="#" class="">
                 <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
              </svg>              
                    <span>Twitter</span>
                </a>
            </div>
         </div>
        </div>

        </div>
    </footer>
    </div>
  </body>
</html>
