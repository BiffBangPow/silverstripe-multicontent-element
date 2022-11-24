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
            <div class="contentblock col-12 $BlockWidth d-flex <% if $ImageFirst %> flex-column<% else %> flex-column-reverse justify-content-end<% end_if %>">
                <% if $Image %>
                    <% with $Image.ScaleMaxWidth(1000) %>
                        <picture>
                            <source type="image/webp" srcset="$Format('webp').URL">
                            <img alt="$Title"
                                 class="w-100 lazyload img-fluid <% if $Up.Up.ImageFirst %>mb-3<% else %>mt-2<% end_if %>"
                                 data-src="$URL"
                                 src="" loading="lazy" width="$Width" height="$Height">
                        </picture>
                    <% end_with %>
                <% end_if %>
                <div class="content">
                    <h3 class="mb-3">$Title</h3>
                    $Content
                    <% if $CTAType != 'None' %>
                        <div class="column-cta">
                            <p>
                                <a href="$CTALink" class="cta-link btn btn-secondary"
                                    <% if $CTAType == 'External' %>target="_blank" rel="noopener"
                                    <% else_if $CTAType == 'Download' %>download
                                    <% end_if %>>
                                    $LinkText
                                </a>
                            </p>
                        </div>
                    <% end_if %>
                </div>
            </div>
        <% end_loop %>
    </div>
</div>


