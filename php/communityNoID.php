<?php
 
$html =  "<div class=\"coin-box\">
    <div class=\"warp community\">
        <h1>".LANG['recom']."</h1>
        <h2>".LANG['cpawt']."</h2>
        <div class=\"search-box\">
            <dl>
                <dd>
                    <i class=\"fa fa-search ser\" ></i>
                    <input class=\"search-keyword\" type=\"text\" id=\"search-keyword\" placeholder=\"".LANG['search']."\">
                    <div class=\"dropdown\"></div>
                    <span class=\"go-btn\">
                        <i class=\"fas fa-arrow-right\"></i>
                    </span>
                </dd>
                <dt>
                    <a class=\"btn-box \" id=\"ask-btn\">".LANG['ask']."</a>
                </dt>
            </dl>
        </div>
        <div class=\"mobileSearchBox\">
            <div class=\"searchBar\">
                <i class=\"fas fa-search\"></i>
                <input class=\"search-keyword\" type=\"text\" name=\"keyword\" id=\"msearch-keyword\" placeholder=\"Search\">
                <i class=\"fas fa-arrow-right mgo-btn\"></i>
            </div>
            <span><a class=\"mSBtn\" id=\"ask-btn\">".LANG['ask']."</a></span>
        </div>
    </div>

    <div class=\"searchSettings\">
        <div class=\"d-1\">
            <p>".LANG['sortBy'].": </p>
            <span class=\"order\">
                <p id=\"p-1\">".LANG['recommended']."</p>
                <ul id=\"id_order\">
                    <p id=\"p-2\">".LANG['date']."</p>
                </ul>
            </span>
        </div>
        <div class=\"d-2\">
            <p>".LANG['lan'].": </p>
            <span class=\"language\">
                <p id=\"selectedLan\"></p>
                <i class=\"fa fa-caret-down i-1 show\"></i><i class=\"fa fa-caret-up i-2 show\"></i>
            </span>
        </div>
    </div>

    <div class=\"selectWarp\">
        <div class=\"selectBox\">
            <i class=\"fa fa-caret-up\"></i>
            <div class=\"lanGroup\">
                <div class=\"rBtn all\" id=\"all\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    All
                </div>
                <div class=\"rBtn en\" id=\"en\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    English
                </div>
                <div class=\"rBtn zh\" id=\"zh\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    中文
                </div>
                <div class=\"rBtn fr\" id=\"fr\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    Français
                </div>
                <div class=\"rBtn es\" id=\"es\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    Español
                </div>
                <div class=\"rBtn ar\" id=\"ar\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    العَرَبِيَّة‎
                </div>
                <div class=\"rBtn it\" id=\"it\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    Italiano
                </div>
                <div class=\"rBtn ru\" id=\"ru\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    Русский
                </div>
                <div class=\"rBtn de\" id=\"de\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    Deutsche
                </div>
                <div class=\"rBtn ja\" id=\"ja\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    日本語
                </div>
                <div class=\"rBtn ko\" id=\"ko\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    한국어
                </div>
                <div class=\"rBtn other\" id=\"other\">
                    <div class=\"checkMark\">
                        <div class=\"circle\"></div>
                    </div>
                    Others
                </div>
            </div>
        </div>
    </div>
    <div class=\"warp\">
        <div class=\"list\">
            <div class=\"v-left\" id=\"community\">";
                      if(rebort == 1){
                        get_file('../community/index');
                        $html .= '<div class="htmlBox">'.get_data().'</div>';
                        for($i=1;$i<=page_list['last_page'];$i++){
                            $html .= '<a href="/?p=community&page='.$i.'">'.$i.'</a>';
                        }
                      }
         $html .= "</div>
        </div>
        <h4 class=\"loadingContent\">Loading Next Page. . . . . .</h4>
        <h4 class=\"loadingEnd\">No More Result.</h4>
    </div>
</div>
<div class=\"dlPopUp\">
    <p class=\"pText\">".LANG['popUpContent']."</p>
    <div class=\"btns\">
        <a class=\"btn-1 dlPClose\">".LANG['closeBtn']."</a>
        <a class=\"btn-2\" href=\"?p=downloadapp#bottom\">".LANG['dlBtn']."</a>
    </div>
</div>
<div class=\"dp fullScreen\"></div>
";
echo $html ;