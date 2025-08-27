@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
        <svg width="150" height="150" viewBox="0 0 255 225" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d_1_4)">
                <path d="M161.2 0.0999851H206.2C220.8 0.0999851 231.8 2.59999 239.2 7.6C246.8 12.6 250.6 21.3 250.6 33.7V199.9C250.6 206.9 249.5 211.5 247.3 213.7C245.3 215.9 240.9 217 234.1 217H202.6V37.3C202.6 34.1 202.1 31.9 201.1 30.7C200.3 29.3 198.1 28.6 194.5 28.6H161.2V0.0999851ZM52.3 217H20.8C14 217 9.5 215.9 7.3 213.7C5.3 211.5 4.3 206.9 4.3 199.9L4.3 12.1C4.3 8.49999 5.3 5.59999 7.3 3.4C9.3 1.19999 11.9 0.0999851 15.1 0.0999851H52.3V217ZM64.6 0.0999851H141.4C144.6 0.0999851 147.2 1.19999 149.2 3.4C151.2 5.59999 152.2 8.49999 152.2 12.1V195.1H121C115 195.1 110.7 193.5 108.1 190.3C105.5 186.9 104.2 181.5 104.2 174.1V37.3C104.2 34.1 103.7 31.9 102.7 30.7C101.9 29.3 99.7 28.6 96.1 28.6H64.6V0.0999851Z" fill="#303030"/>
            </g>
            <defs>
                <filter id="filter0_d_1_4" x="0.299988" y="0.0999756" width="254.3" height="224.9" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_4"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_4" result="shape"/>
                </filter>
            </defs>
        </svg>
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
