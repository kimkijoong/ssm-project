<?php
/**
 * Created by IntelliJ IDEA.
 * User: kwon
 * Date: 2016-04-05
 * Time: 오전 11:06
 */
?>
<style>
    div.cs-skin-slide {
        background: transparent;
        font-size: 2em;
        font-weight: 700;
        max-width: 600px;
        color: #000;
        padding: 1em;
        display: inline-block;
        vertical-align: middle;
        position: relative;
        text-align: left;
        z-index: 100;
        width: 100%;
    }
    div.cs-skin-slide::before{
        background: transparent;

    }

    .cs-skin-slide > span {
        background-color: transparent;
        border: 5px solid #000;
        border-color: inherit;
        height: auto;
    }

<?php phpinfo();?>
    .cs-select span {
        display: block;
        position: relative;
        cursor: pointer;
        padding: 1em;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .cs-skin-slide > span::after, .cs-skin-slide .cs-selected span::after{
        font-family: 'icomoon';
        content: '\e000';
    }
    .cs-skin-slide > span::after, .cs-skin-slide.cs-active > span::after{
        color: #000;
    }
    .cs-skin-slide .cs-options{
        background: rgba(255,255,255,1);
        height: auto;
        width: 100%;
    }
    .cs-skin-slide .cs-options > ul li {
        color: #000;
        font-size: 35px;
    }
    .cs-skin-slide ul span::before{
        background-color: #000;
    }
</style>
<section  class="content-block-nopad content-3-1 hide_section" style="display: none">
    <select class="cs-select cs-skin-border cs-select_01">
        <option value="linkedin" selected>즐겁다</option>
    </select>
</section>
<section  class="content-block-nopad content-3-1 content-3-2" style="margin-top: 200px">
    <div class="overlay overlay-aqua">
        <div class="container text-center">

            <section class="home_section home_section01">
                <div class="home_title">광고는222</div>
                <select class="cs-select cs-skin-slide cs-select_01">
                    <option value="1" selected>즐겁다2222</option>
                    <option value="2">어렵다.222</option>
                    <option value="3">매운맛이다.222</option>
                    <option value="4">유일하다.222</option>
                </select>
            </section>
            <div class="home_content_text">광고를 기획하고 집행할때가 가장 즐겁고 <br/>행복한 사람들이 모인곳이 아인해즈입니다.</div>
        </div>
        <!-- /.container -->
    </div>

</section>
