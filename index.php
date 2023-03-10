<?php
    $webDevBlog = [];
    $qoutes = [];
    $portfolio = [];
    $secretMessage = [];
    $memes = [];

    try{
        include "./connection/connect.php";
        $querySiteSetting = "SELECT * FROM sites";

        $result = $connection->query($querySiteSetting);

        while($row = $result->fetch_assoc()){
            if($row["id"] == 1){
                $webDevBlog = $row;

            }else if($row["id"] == 6){
                $qoutes = $row;

            }else if($row["id"] == 9){
                $portfolio = $row;

            }else if($row["id"] == 10){
                $secretMessage = $row;
            }else if($row["id"] == 11){
                $memes = $row;
            }

        }

    }catch(Exception $err){
        echo $err->getMessage();
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./style/style.css" />
        <link rel="shortcut icon" href="./images/Frame 12.png" type="image/x-icon">
        <title>mlvnworks || Home</title>
    </head>
    <body>
        <!-- circs background -->
        <div class="circle circ1"></div>
        <div class="circle circ2"></div>
        <div class="circle circ3"></div>
        <div class="circle circ4"></div>

        <header>
            <section id="img-and-contacts-section">
                <div>
                    <img src="./images/_header.png" alt="< mlvnworks />" />
                </div>
            </section>
            <div id="search-form">
                <form action="<?= $_SERVER["PHP_SELF"] ?>" method="GET" id="search-form">
                    <input type="text" placeholder="Search something..."id="search-input" required name="search"/>

                    <button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.6 21L13.3 14.7C12.8 15.1 12.225 15.4167 11.575 15.65C10.925 15.8833 10.2333 16 9.5 16C7.68333 16 6.146 15.371 4.888 14.113C3.62933 12.8543 3 11.3167 3 9.5C3 7.68333 3.62933 6.14567 4.888 4.887C6.146 3.629 7.68333 3 9.5 3C11.3167 3 12.8543 3.629 14.113 4.887C15.371 6.14567 16 7.68333 16 9.5C16 10.2333 15.8833 10.925 15.65 11.575C15.4167 12.225 15.1 12.8 14.7 13.3L21 19.6L19.6 21ZM9.5 14C10.75 14 11.8127 13.5627 12.688 12.688C13.5627 11.8127 14 10.75 14 9.5C14 8.25 13.5627 7.18733 12.688 6.312C11.8127 5.43733 10.75 5 9.5 5C8.25 5 7.18733 5.43733 6.312 6.312C5.43733 7.18733 5 8.25 5 9.5C5 10.75 5.43733 11.8127 6.312 12.688C7.18733 13.5627 8.25 14 9.5 14Z"
                                fill="white" />
                        </svg>
                    </button>
                </form>
            </div>
        </header>
        <main>
            <section id="grid-section">
                <div class="grid-item 1" data-err-reason ="<?= $webDevBlog["reason_if_unavailable"] ?>" data-available="<?= $webDevBlog["available"] == 1 ? 'TRUE' : 'FALSE' ?>" data-link="<?= $webDevBlog["link"] ?>">
                    <p class="title"><?= $webDevBlog["site_name"] ?></p>
                    <div class="img-container">
                        <img src="./images/489168 1webdev.png" alt="" />
                    </div>
                </div>

                <div class="grid-item 2" data-err-reason ="<?= $qoutes["reason_if_unavailable"] ?>" data-available="<?= $qoutes["available"] == 1 ? 'TRUE' : 'FALSE' ?>" data-link="<?= $qoutes["link"] ?>">
                    <p class="title"><?= $qoutes["site_name"] ?></p>
                    <div class="img-container">
                        <img src="./images/4K-Tropical-Flowers-Aircraft-Picture 1.png" alt="" />
                    </div>
                </div>

                <div class="grid-item 3" data-err-reason ="<?= $portfolio["reason_if_unavailable"]?>" data-available="<?= $portfolio["available"] == 1 ? 'TRUE' : 'FALSE' ?>" data-link="<?= $portfolio["link"] ?>">
                    <p class="title"><?= $portfolio["site_name"] ?></p>
                    <div class="img-container">
                        <img src="./images/390439 1.png" alt="" />
                    </div>
                </div>

                <div class="grid-item 4" data-err-reason ="<?= $secretMessage["reason_if_unavailable"]?>" data-available="<?= $secretMessage["available"] == 1 ? 'TRUE' : 'FALSE' ?>" data-link="<?= $secretMessage["link"] ?>">
                    <p class="title"><?= $secretMessage["site_name"] ?></p>
                    <div class="img-container">
                        <img src="./images/secret-pic.png" alt="" />
                    </div>
                </div>

                <div class="grid-item 5" data-err-reason ="<?= $memes["reason_if_unavailable"]?>" data-available="<?= $memes["available"] == 1 ? 'TRUE' : 'FALSE' ?>" data-link="<?= $memes["link"] ?>">
                    <p class="title"><?= $memes["site_name"] ?></p>
                    <div class="img-container">
                        <img src="./images/2877459 1.png" alt="" />
                    </div>
                </div>
            </section>
        </main>

        <!-- Modals -->
        <?php
            if(isset($_GET["search"])){
                include "./assets/modal/searchModal.php";
            }

            include "./assets/modal/alertModal.html";
        ?>
        <footer>Copyright &copy; 2022 mlvnworks.com</footer>
        <script>
            // Search Form 
            const searchForm = document.querySelector("#search-form");
            const searchInput = searchForm.querySelector("#search-input");

            // close search modal
            const closeModalBtn = document.querySelector("#close-search-modal");
            const searchModal = document.querySelector("#search-modal");

            // Alert modal
            const gridItems = document.querySelectorAll(".grid-item");
            const alertModal = document.querySelector(".alert-modal");
            const closeAlertModalBtn = document.querySelector("#close-alert-modal");
            
            const checkSiteAvailability = (data, link,reason) => {
                if(data === "FALSE"){
                    alertModal.style.display = "flex";
                    alertModal.querySelector("#alert-msg").textContent = reason;
                    
                }else{
                    location.href = link;
                }
            }

            gridItems.forEach(gridItem => {
                gridItem.addEventListener("click", () => checkSiteAvailability(gridItem.getAttribute("data-available"), gridItem.getAttribute("data-link"), gridItem.getAttribute("data-err-reason")));
            })
            
            
            const checkSearchInput = (ev)  => {
                if(searchInput.value === "" || searchInput.value ===""){
                    ev.preventDefault();
                }
            }

            const closeSearchModal = () => {
                location.href = '<?= $_SERVER["PHP_SELF"] ?>';
            }

            //event handling    
            searchForm.addEventListener("submit", checkSearchInput);

            if(closeModalBtn !== null){
                closeModalBtn.addEventListener("click", closeSearchModal)
            }

            if(closeAlertModalBtn !== null){
                closeAlertModalBtn.addEventListener("click", () => alertModal.style.display="none")
            }

        </script>
    </body>
</html>
