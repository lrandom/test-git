<?php
error_reporting(E_ERROR | E_PARSE);
$para = <<<EOT
Nowadays, some employers notice that their newly-hired <mark class="prep-highlight no-select error-highlight tag-highlight prep-replace prep-comment" prep-mark-index="1" marking-tag-ids-error="20" prep-selected="employees' scarcity of basic interpersonal skills, namely teamwork" prep-replace=""><del style="text-decoration: none;">employees' scarcity of basic interpersonal skills, namely teamwork</del><span class="correct-line"> </span></mark><sup id="prep-tag-39197-1">1</sup>. <mark class="prep-highlight no-select error-highlight tag-highlight prep-replace prep-comment" prep-mark-index="2" marking-tag-ids-error="2" prep-selected="This situation poses poor working efficiency " prep-replace="There are some underlying reasons for this problem"><del class="replace-line">This situation poses poor working efficiency </del><span class="correct-line">There are some underlying reasons for this problem </span></mark><sup id="prep-tag-39197-2">2</sup><mark class="prep-highlight no-select prep-replace" prep-mark-index="3" prep-selected="and almost no opportunity for interpersonal interaction in the working environment." prep-replace="and"><del class="replace-line">and almost no opportunity for interpersonal interaction in the working environment.</del><span class="correct-line">and </span></mark> It must be addressed by some definite measure <mark class="prep-highlight no-select prep-replace" prep-mark-index="6" prep-selected="such as" prep-replace="due to"><del class="replace-line">such as</del><span class="correct-line">due to </span></mark> <mark class="prep-highlight no-select error-highlight tag-highlight prep-replace prep-comment" prep-mark-index="4" marking-tag-ids-error="2" prep-selected="the nature of their previous workplace is not conditional on being able to develop these skills" prep-replace=""><del style="text-decoration: none;">the nature of their previous workplace is not conditional on being able to develop these skills</del><span class="correct-line"> </span></mark><sup id="prep-tag-39197-3">3</sup>.
<mark class="prep-highlight no-select tag-highlight prep-replace prep-comment error-highlight" prep-mark-index="8" prep-selected="Firstly" prep-replace="The lack of interpersonal skills of many students is due to a number of reasons. The primary reason for" marking-tag-ids-error="12"><del class="replace-line">Firstly</del><span class="correct-line">The lack of interpersonal skills of many students is due to a number of reasons. The primary reason for</span></mark><sup id="prep-tag-39197-4">4</sup>, <mark class="prep-highlight no-select good-use-highlight tag-highlight prep-replace" prep-mark-index="10" marking-tag-ids-good-use="54|55|62|63" prep-selected="the shortage of interpersonal skills in workers may be due to their old working environment. In many companies, employees are divided into their own small workplaces and do not have to condition to connect with the others. Moreover, their employers give " prep-replace=""><del style="text-decoration: none;">the shortage of interpersonal skills in workers may be due to their old working environment. In many companies, employees are divided into their own small workplaces and do not have to condition to connect with the others. Moreover, their employers give </del><span class="correct-line"> </span></mark><sup id="prep-tag-39197-5">5</sup>them tasks that are unrelated to their colleagues. Interpersonal communication about work is not possible in such an environment and since then, teamwork skills cannot be improved. Secondly, higher education at many institutions today focuses on raising students' understanding of their professional fields rather than on developing the soft skills needed for future jobs.<mark class="prep-highlight no-select error-highlight tag-highlight prep-replace prep-comment" prep-mark-index="11" marking-tag-ids-error="4" prep-selected=" So today's reality is that" prep-replace="xóa"><del class="replace-line"> So today's reality is that</del><span class="correct-line">xóa </span></mark><sup id="prep-tag-39197-6">6</sup> students after graduation are seriously lacking in skills that require interpersonal connection and they can't work well with the rest of their colleagues.
<mark class="prep-highlight no-select good-use-highlight tag-highlight prep-replace" prep-mark-index="12" marking-tag-ids-good-use="54|56|59|62" prep-selected="There are some actions that can be implemented by companies and universities to ameliorate the problem." prep-replace=""><del style="text-decoration: none;">There are some actions that can be implemented by companies and universities to ameliorate the problem.</del><span class="correct-line"></span></mark><sup id="prep-tag-39197-7">7</sup> <mark active-suggest-replacement-index="0" suggest_replacements="" suggest_comment="This sentence is over 40 words long. Consider splitting it up, as shorter sentences make the text easier to read." class="no-select prep-highlight prep-comment" prep-selected="For example, work companies can change the way they work to facilitate collective work such as assigning them a workload that requires a lot of knowledge of diverse fields and for such employees from different fields to work together, which will facilitate the exchange of experiences and links them together" prep-replace="Companies can change the way they work to facilitate collective work such as assigning them a workload that requires a lot of knowledge of diverse fields and for such employees from different fields to work together. This, as a result, will facilitate the exchange of experiences and link them together."><del class="replace-line">For example, work companies can change the way they work to facilitate collective work such as assigning them a workload that requires a lot of knowledge of diverse fields and for such employees from different fields to work together, which will facilitate the exchange of experiences and links them together</del><span class="correct-line">Companies can change the way they work to facilitate collective work such as assigning them a workload that requires a lot of knowledge of diverse fields and for such employees from different fields to work together. This, as a result, will facilitate the exchange of experiences and link them together.</span></mark>. In universities today, grading and teaching criteria should focus on training and developing soft skills for students too. The organization of seminars to specialize in the skills needed for the student's future job should also be given more attention.'
In conclusion, in my personal aspect, I think that employees <mark class="prep-highlight no-select error-highlight tag-highlight prep-replace prep-comment" prep-mark-index="14" marking-tag-ids-error="26" prep-selected="who scarcity " prep-replace="with limited"><del class="replace-line">who scarcity </del><span class="correct-line">with limited </span></mark><sup id="prep-tag-39197-8">8</sup>basic interpersonal skills are because their previous work environment did not allow them to develop those skills. In the future, <mark class="prep-highlight no-select error-highlight tag-highlight prep-replace prep-comment" prep-mark-index="15" marking-tag-ids-error="5" prep-selected="if current businesses agree to change the way they work individually" prep-replace=""><del style="text-decoration: none;">if current businesses agree to change the way they work individually</del><span class="correct-line"> </span></mark><sup id="prep-tag-39197-9">9</sup>, the shortages in terms of teamwork will be greatly reduced.';
EOT;

function convertHTMLToActualData($para)
{
    //cái này lọc từ đoạn văn có tag thành đoạn văn không tag luôn, tránh sai lệch dấu xuống dòng các kiểu
    $para = "<html><body><p>$para</p></body></html>";

    $doc = new DOMDocument();
    $doc->loadHTML($para);
    $markNodes = $doc->getElementsByTagName("mark");
    foreach ($markNodes as $markNode) {
        $markNode->removeAttribute('prep-comment');
        $pNode = $doc->getElementsByTagName('p')->item(0);

        $splitData = explode($doc->saveHTML($markNode), $doc->saveHTML($pNode));
        $splitData = str_replace('<p>', '', $splitData);
        $splitData = str_replace('</p>', '', $splitData);

        $tmpDoc = new DOMDocument();
        $tmpDoc->loadHTML($splitData[0]);
        $supTags = $tmpDoc->getElementsByTagName('sup');
        $spanTags = $tmpDoc->getElementsByTagName('span');
        while ($supTags->length > 0) {
            $tag = $supTags->item(0);
            $tag->parentNode->removeChild($tag);
        }

        while ($spanTags->length > 0) {
            $tag = $spanTags->item(0);
            $tag->parentNode->removeChild($tag);
        }

        $tmpDoc->saveHTML();
        $markNodesInTmpDoc = $tmpDoc->getElementsByTagName('mark');
        while ($markNodesInTmpDoc->length > 0) {
            $tag = $markNodesInTmpDoc->item(0);
            $newNode = $tmpDoc->createTextNode($tag->nodeValue);
            $tag->parentNode->insertBefore($newNode, $tag);
            $tag->parentNode->removeChild($tag);
        }
        $pNode = $tmpDoc->getElementsByTagName('p')->item(0);
        $pNodeInnerHTML = $tmpDoc->saveHTML($pNode);
        $pNodeInnerHTML = str_replace('<p>', '', $pNodeInnerHTML);
        $pNodeInnerHTML = str_replace('</p>', '', $pNodeInnerHTML);


        $offset = (int)(strlen($pNodeInnerHTML));
        echo $offset;
        echo "\n";
    }
}

convertHTMLToActualData($para);
?>