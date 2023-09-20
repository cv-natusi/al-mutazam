<div class="row gradient"><!-- AMTV -->
    <div class="col-md-12 my-3">
        <h1>AMTV Terbaru</h1>
    </div>
</div>
<div class="row d-flex align-items-center">
    @if (count($amtvs) > 0)
        @foreach ($amtvs as $idx => $amtv)
            @php
                $url = explode('?v=', $amtv->file);
                $link = $url[count($url) - 1];
            @endphp
            <div class="col-lg-12">
                <div class="contact-box">
                    <div class="row">
                        <div class="col-md-3 mtb-auto">
                            <iframe class="img-80"
                                src="http://www.youtube.com/embed/{{ $link }}" frameborder="0"
                                allowfullscreen>
                            </iframe>

                        </div>
                        <div class="col-md-9 mtb-auto text-left">
                            <span class="fw4">{{ $amtv->judul_amtv }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>