{extends file="../../templates/main.tpl"}

{block name=footer} PP. All rights reserved. Design: <a href="http://html5up.net">HTML5 UP</a>{/block}

{block name=content}

    <header>
        <h2>Kalkulator kredytowy</h2>
        <p>Wylicz swoją ratę</p>
    </header>


    <div class="row">
        <div class="col-12">

            <!-- Form -->
            <section class="box">

                <form method="post" action="{$conf->action_root}calcCompute">
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-6 col-12-mobilep">
                            <input type="text" name="amt" id="amt" value="{$form->amt}" placeholder="Kwota kredytu" />
                        </div>
                        <div class="col-6 col-12-mobilep">
                            <input type="text" name="yrs" id="yrs" value="{$form->yrs}" placeholder="Liczba lat" />
                        </div>
                        <div class="col-6 col-12-mobilep">
                            <input type="text" name="rt" id="rt" value="{$form->rt}" placeholder="Oprocentowanie" />
                        </div>



                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Oblicz ratę kredytu" /></li>
                                <li><input class="alt" type="reset" value="Resetuj"  /></li>
                            </ul>
                        </div>
                    </div>
                </form>

                <hr />

            </section>

        </div>
    </div>







    <div class="messages">

        {* wyświeltenie listy błędów, jeśli istnieją *}
        {if $msgs->isError()}
            <h4>Wystąpiły błędy: </h4>
            <ol class="err">
                {foreach $msgs->getErrors() as $err}
                    {strip}
                        <li>{$err}</li>
                        {/strip}
                    {/foreach}
            </ol>
        {/if}


        {* wyświeltenie listy informacji, jeśli istnieją *}
        {if $msgs->isInfo()}
            <h4>Informacje: </h4>
            <ol class="inf">
                {foreach $msgs->getInfos() as $inf}
                    {strip}
                        <li>{$inf}</li>
                        {/strip}
                    {/foreach}
            </ol>
        {/if}
 

            {if isset($res->result)}
                <h4>Wynik:</h4>
                <p class="res">
                    {$res->result} zł
                </p>
            {/if}

        </div>

        {/block}