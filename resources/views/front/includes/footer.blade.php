<footer class="footer   footer-white ">
    <div class="container">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    @foreach (pages() as $page)
                        <li>
                            <a href="{{route('front.page',$page->name)}}" > {{pageNameReplaceespace($page->name)}}</a>
                        </li>
                    @endforeach


                </ul>
            </nav>
            <div class="credits ml-auto">
                <span class="copyright">
                    {{ date('Y') }} ©
                    ,Hala <i class="fa fa-heart heart"></i> Madrid
                </span>
            </div>
        </div>
    </div>
</footer>
