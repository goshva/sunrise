@extends('components.head')
@section('code')
    <div class="sect">
        <x-client-side-bar></x-client-side-bar>
        <x-client-header></x-client-header>
        <div class="learning_material">
            <div class="learning_material_content">
                <div class="learning_material_content_up">
                    <div class="learning_material_content_up_left">
                        <div class="learning_material_content_up_left__up">
                            <div class="learning_material_header">
                                <h2>Основные термины и определения</h2>
                            </div>
                        </div>
                        <div class="learning_material_content_up_left_down">
                            <div class="learning_material_percent">
                                <span>Прочитано 3%</span>
                            </div>
                            <div class="status-bar">
                                <span class="status-per">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="learning_material_content_up_right">
                        <div class="learning_material_button">
                            <button>Сохранить и выйти</button>
                        </div>
                    </div>
                </div>
                <div class="learning_material_content_down">
                    <div class="learning_material_content_down_content">
                        <div class="learning_material_content_down_content_header">
                            <h2>Раздел 1</h2>
                        </div>
                        <div class="learning_material_content_down_content_text_container"> 
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Laoreet sit amet cursus sit. Et netus et malesuada fames ac turpis egestas integer. Leo duis ut diam quam nulla porttitor massa id neque. Imperdiet nulla malesuada pellentesque elit eget. Et malesuada fames ac turpis egestas integer. Suspendisse sed nisi lacus sed viverra tellus. Ut sem viverra aliquet eget sit. Euismod nisi porta lorem mollis aliquam ut porttitor leo. Vivamus at augue eget arcu dictum. Vitae ultricies leo integer malesuada nunc vel risus commodo viverra. Aliquet porttitor lacus luctus accumsan. Facilisis leo vel fringilla est ullamcorper. Suscipit tellus mauris a diam maecenas. Volutpat est velit egestas dui id ornare arcu odio ut. Auctor urna nunc id cursus. Orci eu lobortis elementum nibh. Scelerisque viverra mauris in aliquam sem.
                                Nunc mi ipsum faucibus vitae aliquet nec. Odio tempor orci dapibus ultrices. Pharetra convallis posuere morbi leo urna. Mauris cursus mattis molestie a iaculis at erat pellentesque. Est sit amet facilisis magna etiam. Risus feugiat in ante metus dictum at tempor commodo. At in tellus integer feugiat scelerisque varius. Quis imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper. Vulputate eu scelerisque felis imperdiet proin. Nec ullamcorper sit amet risus nullam eget felis. In hendrerit gravida rutrum quisque. Tincidunt ornare massa eget egestas purus viverra. Est lorem ipsum dolor sit amet. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci. Eu facilisis sed odio morbi quis commodo odio. Hendrerit gravida rutrum quisque non tellus. Velit laoreet id donec ultrices tincidunt. Egestas congue quisque egestas diam in arcu cursus. Consequat nisl vel pretium lectus quam id.
                                Mollis aliquam ut porttitor leo a diam. Cursus eget nunc scelerisque viverra mauris in aliquam sem. At in tellus integer feugiat scelerisque varius. Netus et malesuada fames ac turpis. Pretium lectus quam id leo. Feugiat in ante metus dictum at tempor commodo ullamcorper. Eget lorem dolor sed viverra ipsum nunc aliquet bibendum enim. Neque laoreet suspendisse interdum consectetur libero. Vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Quis lectus nulla at volutpat. Velit aliquet sagittis id consectetur purus ut faucibus. Et pharetra pharetra massa massa ultricies mi. Felis bibendum ut tristique et egestas quis. Cras sed felis eget velit. Mollis aliquam ut porttitor leo a diam. Cursus eget nunc scelerisque viverra mauris in aliquam sem. At in tellus integer feugiat scelerisque varius. Netus et malesuada fames ac turpis. Pretium lectus quam id leo. Feugiat in ante metus dictum at tempor commodo ullamcorper. Eget lorem dolor sed viverra ipsum nunc aliquet bibendum enim.
                            </p>
                        </div>
                    </div>
                    <div class="repost-slider">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M8.9725 12.2775C8.9725 12.0875 9.0425 11.8975 9.1925 11.7475L12.7225 8.2175C13.0125 7.9275 13.4925 7.9275 13.7825 8.2175C14.0725 8.5075 				14.0725 8.9875 13.7825 9.2775L10.7825 12.2775L13.7825 15.2775C14.0725 15.5675 14.0725 16.0475 13.7825 16.3375C13.4925 16.6275 13.0125 			16.6275 12.7225 16.3375L9.1925 				12.8075C9.0425 12.6575 8.9725 12.4675 8.9725 12.2775Z" fill="#CFD1D8"/>
                        </svg>
            
                        <div class="repost-slide_active">1</div>
                        <div class="repost-slide">2</div>
                        <div class="repost-slide">3</div>
                        <div class="repost-slide">4</div>
                        <div class="repost-slide">5</div>
            
                        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M14.0275 12.2775C14.0275 12.0875 13.9575 11.8975 13.8075 11.7475L10.2775 8.2175C9.9875 7.9275 9.5075 7.9275 9.2175 8.2175C8.9275 8.5075 			8.9275 8.9875 9.2175 9.2775L12.2175 12.2775L9.2175 15.2775C8.9275 15.5675 8.9275 16.0475 9.2175 16.3375C9.5075 16.6275 9.9875 16.6275 10.2775 			16.3375L13.8075 			12.8075C13.9575 12.6575 14.0275 12.4675 14.0275 12.2775Z" fill="#8A92A6"/>
                          </svg>
                        </a>  
                    </div>
                </div>
            </div>

        </div>
    </div>
<x-footer></x-footer>
@endsection