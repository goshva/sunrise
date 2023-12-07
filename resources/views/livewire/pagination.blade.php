<div>
    @if ($paginator->hasPages())
    <div class="user-slider">
        @if ($paginator->onFirstPage())
        <svg class="pag_svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M8.9725 12.2775C8.9725 12.0875 9.0425 11.8975 9.1925 11.7475L12.7225 8.2175C13.0125 7.9275 13.4925 7.9275 13.7825 8.2175C14.0725 8.5075 14.0725 8.9875 13.7825 9.2775L10.7825 12.2775L13.7825 15.2775C14.0725 15.5675 14.0725 16.0475 13.7825 16.3375C13.4925 16.6275 13.0125 16.6275 12.7225 16.3375L9.1925 12.8075C9.0425 12.6575 8.9725 12.4675 8.9725 12.2775Z" fill="#CFD1D8"/>
        </svg>
        @else
       <a > <svg class="pag_svg" wire:click="previousPage" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M8.9725 12.2775C8.9725 12.0875 9.0425 11.8975 9.1925 11.7475L12.7225 8.2175C13.0125 7.9275 13.4925 7.9275 13.7825 8.2175C14.0725 8.5075 14.0725 8.9875 13.7825 9.2775L10.7825 12.2775L13.7825 15.2775C14.0725 15.5675 14.0725 16.0475 13.7825 16.3375C13.4925 16.6275 13.0125 16.6275 12.7225 16.3375L9.1925 12.8075C9.0425 12.6575 8.9725 12.4675 8.9725 12.2775Z" fill="#8A92A6"/>
    </svg></a>
        @endif
        <div style="display: flex;">
            @foreach ($elements as $element)
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <div wire:click="gotoPage({{$page}})" class="user-slide user-slide_active" style="margin:0 5px">{{ $page }}</div>
        @else
        <div  wire:click="gotoPage({{$page}})" class="user-slide" style="margin:0 5px">{{ $page }}</div>
        @endif
        @endforeach
        @endif
        @endforeach
        </div>
        @if ($paginator->hasMorePages())
        <a ><svg class="pag_svg" wire:click="nextPage" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M14.0275 12.2775C14.0275 12.0875 13.9575 11.8975 13.8075 11.7475L10.2775 8.2175C9.9875 7.9275 9.5075 7.9275 9.2175 8.2175C8.9275 8.5075 8.9275 8.9875 9.2175 9.2775L12.2175 12.2775L9.2175 15.2775C8.9275 15.5675 8.9275 16.0475 9.2175 16.3375C9.5075 16.6275 9.9875 16.6275 10.2775 16.3375L13.8075 12.8075C13.9575 12.6575 14.0275 12.4675 14.0275 12.2775Z" fill="#8A92A6"/>
        </svg>
        </a>  
        @else
        <a  ><svg class="pag_svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M14.0275 12.2775C14.0275 12.0875 13.9575 11.8975 13.8075 11.7475L10.2775 8.2175C9.9875 7.9275 9.5075 7.9275 9.2175 8.2175C8.9275 8.5075 8.9275 8.9875 9.2175 9.2775L12.2175 12.2775L9.2175 15.2775C8.9275 15.5675 8.9275 16.0475 9.2175 16.3375C9.5075 16.6275 9.9875 16.6275 10.2775 16.3375L13.8075 12.8075C13.9575 12.6575 14.0275 12.4675 14.0275 12.2775Z" fill="#CFD1D8"/>
        </svg>
        </a>  
        @endif
</div>
    @endif
</div>