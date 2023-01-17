<?php
    $searchResult = null;
    $searchKeyword = htmlspecialchars($_GET["search"]);
?>

<section id="search-modal">
    <section class="search-modal-body">
        <div id="return-and-keyword">
            <button id="close-search-modal">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 8.70248H4.15771L9.90659 1.8347L8.37081 0L0 10L8.37081 20L9.90659 18.1653L4.15771 11.2975H20V8.70248Z" fill="#CCCCCC" fill-opacity="0.8"/>
                </svg>
            </button>
            <p><span>Search for:</span> <?= $searchKeyword ?></p>
        </div>
        <?php if($searchResult === null) echo '<div id="search-loading"></div>';
                else if($searchResult !== null && count($searchResult) > 0)
                        echo ('<ul id="search-result-lists">
                            <li class="search-result-item">
                                <a href="#">
                                    <header>Search Result Item 1</header>
                                    <p class="search-result-link"><i>//somthinglink...</i></p>
                                </a>
                            </li>
                        </ul>');
                else echo '<div id="not-found">No Result Found!</div>'
        ?>
        
    </section>
</section>