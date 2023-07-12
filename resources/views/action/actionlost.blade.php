<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="d-flex">
        <a href="{{ route('losts.show', ['lost' => $lost->id]) }}" class="btn btn-outline-dark btn-sm me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 45 46" fill="none">
                <path d="M9.29407 12.059H6.86271C5.57304 12.059 4.33619 12.5713 3.42426 13.4833C2.51232 14.3952 2 15.6321 2 16.9217V38.804C2 40.0936 2.51232 41.3305 3.42426 42.2424C4.33619 43.1544 5.57304 43.6667 6.86271 43.6667H28.7449C30.0346 43.6667 31.2715 43.1544 32.1834 42.2424C33.0953 41.3305 33.6076 40.0936 33.6076 38.804V36.3726" stroke="#FF9A62" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M31.1762 7.19632L38.4703 14.4904M41.8377 11.05C42.7953 10.0924 43.3333 8.79368 43.3333 7.43945C43.3333 6.08523 42.7953 4.78647 41.8377 3.82889C40.8802 2.87131 39.5814 2.33334 38.2272 2.33334C36.8729 2.33334 35.5742 2.87131 34.6166 3.82889L14.1567 24.2158V31.5099H21.4508L41.8377 11.05Z" stroke="#FF9A62" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <a href="{{ route('losts.edit', ['lost' => $lost->id]) }}" class="btn btn-outline-dark btn-sm me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 44 44" fill="none">
                <path d="M36.6666 5.5H7.33329C5.31113 5.5 3.66663 7.1445 3.66663 9.16667V34.8333C3.66663 36.8555 5.31113 38.5 7.33329 38.5H36.6666C38.6888 38.5 40.3333 36.8555 40.3333 34.8333V9.16667C40.3333 7.1445 38.6888 5.5 36.6666 5.5ZM7.33329 34.8333V9.16667H36.6666L36.6703 34.8333H7.33329Z" fill="#FF9A62"/>
                <path d="M11 14.6667C11 13.6541 11.8208 12.8333 12.8333 12.8333H31.1667C32.1792 12.8333 33 13.6541 33 14.6667C33 15.6792 32.1792 16.5 31.1667 16.5H12.8333C11.8208 16.5 11 15.6792 11 14.6667ZM11 22C11 20.9875 11.8208 20.1667 12.8333 20.1667H31.1667C32.1792 20.1667 33 20.9875 33 22C33 23.0125 32.1792 23.8333 31.1667 23.8333H12.8333C11.8208 23.8333 11 23.0125 11 22ZM11 29.3333C11 28.3208 11.8208 27.5 12.8333 27.5H20.1667C21.1792 27.5 22 28.3208 22 29.3333C22 30.3459 21.1792 31.1667 20.1667 31.1667H12.8333C11.8208 31.1667 11 30.3459 11 29.3333Z" fill="#FF9A62"/>
            </svg>
        </a>

        <div>
            <form action="{{ route('losts.destroy', ['lost' => $lost->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-dark btn-sm me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 42 43" fill="none">
                        <path d="M15.75 17.4375C15.75 16.7126 16.3376 16.125 17.0625 16.125C17.7874 16.125 18.375 16.7126 18.375 17.4375V30.9375C18.375 31.6624 17.7874 32.25 17.0625 32.25C16.3376 32.25 15.75 31.6624 15.75 30.9375V17.4375ZM23.625 17.4375C23.625 16.7126 24.2126 16.125 24.9375 16.125C25.6624 16.125 26.25 16.7126 26.25 17.4375V30.9375C26.25 31.6624 25.6624 32.25 24.9375 32.25C24.2126 32.25 23.625 31.6624 23.625 30.9375V17.4375Z" fill="#FF9A62"/>
                        <path d="M6.59375 8.0625C5.85162 8.0625 5.25 8.66412 5.25 9.40625V9.4375C5.25 10.1624 5.83763 10.75 6.5625 10.75C7.28737 10.75 7.875 11.3376 7.875 12.0625V37.625C7.875 38.3378 8.15156 39.0213 8.64384 39.5253C9.13613 40.0294 9.80381 40.3125 10.5 40.3125H31.5C32.1962 40.3125 32.8639 40.0294 33.3562 39.5253C33.8484 39.0213 34.125 38.3378 34.125 37.625V12.0625C34.125 11.3376 34.7126 10.75 35.4375 10.75C36.1624 10.75 36.75 10.1624 36.75 9.4375V9.40625C36.75 8.66412 36.1484 8.0625 35.4062 8.0625H6.59375ZM13.5 37.625C11.8431 37.625 10.5 36.2819 10.5 34.625V13.75C10.5 12.0931 11.8431 10.75 13.5 10.75H28.5C30.1569 10.75 31.5 12.0931 31.5 13.75V34.625C31.5 36.2819 30.1569 37.625 28.5 37.625H13.5ZM15.75 4.03125C15.75 3.28912 16.3516 2.6875 17.0938 2.6875H24.9062C25.6484 2.6875 26.25 3.28912 26.25 4.03125C26.25 4.77338 25.6484 5.375 24.9062 5.375H17.0938C16.3516 5.375 15.75 4.77338 15.75 4.03125Z" fill="#FF9A62"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</body>
</html>
