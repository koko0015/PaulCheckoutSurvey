{extends file="parent:frontend/checkout/confirm.tpl"}

{block name="frontend_checkout_confirm_information_wrapper"}
    {$smarty.block.parent}

    <div class="panel has--border additional--features">
        <div class="panel--title is--underline">
            {s name='CheckoutSurvey'}Wo haben Sie uns zuerst gefunden? - Danke!{/s}
        </div>

        <div class="panel--body is--wide block-group">
            <select data-ajaxUrl="{url controller='paulajax' action='savecheckoutsurvey' forceSecure}"
                    id="CheckoutSurveyAnswer"
                    name="CheckoutSurveyAnswer">

                <option value="Keine Auswahl">{s name='CheckoutSurveyPlacholder'}Auswahl...{/s}</option>
                <option value="Amazon">Amazon</option>
                <option value="eBay">eBay</option>
                <option value="Google">Google Suche</option>
                <option value="Google Shopping">Google Shopping</option>
                <option value="Empfehlung">Empfehlung</option>
                <option value="Real.de">Real.de</option>
                <option value="BING">BING</option>
                <option value="Andere Suchmaschiene">Andere Suchmaschiene</option>
                <option value="Keine Auskunft">Keine Auskunft</option>
            </select>
        </div>
    </div>
{/block}
