<div class="container">
    <% if $Title && $ShowTitle %>
        <div class="row">
            <div class="col-12">
                <h2 class="mb-3">$Title</h2>
            </div>
        </div>
    <% end_if %>
    <div class="row">
        <% loop $ContentBlocks %>
            <div class="contentblock col-12 $BlockWidth<% if not $ImageFirst %> imagelast<% end_if %> <% if not $Last %>mb-3 mb-lg-4<% end_if %>">
                <% if $Image %>
                    <% with $Image.ScaleMaxWidth(1000) %>
                        <picture>
                            <source type="image/webp" srcset="$Format('webp').URL">
                            <img alt="$Title"
                                 class="w-100 lazyload img-fluid <% if $ImageFirst %>pb-4<% else %>pt-4<% end_if %>"
                                 data-src="$URL"
                                 src="" loading="lazy" width="$Width" height="$Height">
                        </picture>
                    <% end_with %>
                <% end_if %>
                <div class="content">
                    <h3 class="mb-3">$Title</h3>
                    $Content
                </div>
            </div>
        <% end_loop %>
    </div>
</div>


