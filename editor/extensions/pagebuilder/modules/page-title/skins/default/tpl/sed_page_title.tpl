<#
var length_class;
if(length == "boxed")
    length_class = "sed-row-boxed";
else
    length_class = "sed-row-wide";
#>
<div {{sed_attrs}} sed_role="page-title-bar" class="module module-page-title page-title-default {{className}}">
    <div class="page-title-inner {{length_class}}" length_element>
        {{{content}}}
    </div>
</div>