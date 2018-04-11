{extends file="parent:frontend/checkout/confirm.tpl"}

{block name="frontend_checkout_confirm_additional_features_add_product"}
    {$smarty.block.parent}

    {* Additional Order Survey *}
    {block name='frontend_checkout_confirm_comment_survey'}
        <div>
            <h4>{s name='CheckoutSurvey'}Wo haben Sie uns zuerst gefunden?{/s}</h4>
            <select>
                <option value="">{s name='CheckoutSurveyPlacholder'}Auswahl...{/s}</option>
                <option value="amazon">Amazon</option>
                <option value="ebay">eBay</option>
                <option value="googleSearch">Google Suche</option>
                <option value="googleShopping">Google Shopping</option>
                <option value="recommendation ">Empfehlung</option>
                <option value="other">Andere Suchmaschiene</option>
            </select>
        </div>
    {/block}
{/block}