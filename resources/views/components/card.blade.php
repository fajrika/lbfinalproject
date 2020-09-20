<style>.right_col>.row>div>div{background:#fff;padding:10px 30px;}.dt-buttons>button{margin-right:2px!important}</style>
<div class="row">
    <div class="col-lg-{{ $type }} col-md-{{ $type }} col-sm-12 col-xs-12">
        <div>
            <div class="row x_title">
                <div class="col-md-6">
                    <h3>{{ $title ?? 'Title' }} 
                        <small>{{ $subtitle ?? 'Subtitle' }}</small>
                    </h3>
                </div>
            </div>
            <div>
                {{ $slot }}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>
