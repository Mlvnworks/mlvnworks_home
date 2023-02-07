<?php
    $searchResult = null;

    $searchKeyword = htmlspecialchars($_GET["search"]);

    try{
        $splitWordSearch = explode(" ", strtolower($searchKeyword));

        
        include "./connection/connect.php";

        $query = 
            'SELECT 
            CONCAT(blogs.head_line, blogs.json_content) as keyword,
            blogs.head_line,
            search_keywords.link
            from search_keywords
            INNER JOIN blogs on search_keywords.target_id = blogs.id
            WHERE CONCAT(blogs.head_line, blogs.json_content) LIKE "%'.$searchKeyword.'%"';
        
        $response = $connection -> query($query);

        $searchResult = [];
        while($row = $response->fetch_assoc()){
            $searchResult = [...$searchResult, $row];
        };
        
        $connection -> close();
    }catch(Exception $err){
        echo $err->getMessage();
    }
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
                else if($searchResult !== null && count($searchResult) > 0){
                    foreach($searchResult as $resultItem){
                        echo ('<ul id="search-result-lists">
                            <li class="search-result-item">
                                <a href="'.$resultItem["link"]. '">
                                    <header>'.$resultItem["head_line"].'</header>
                                    <p class="search-result-link"><i>"'.$resultItem["link"]. '"</i></p>
                                </a>
                            </li>
                        </ul>');
                    }
                }
                else echo '<div id="not-found">No Result Found!</div>'
        ?>
    </section>
</section>