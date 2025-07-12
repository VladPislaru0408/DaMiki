window.initMap = function () {
    const location = { lat: 46.690159, lng: 27.756375 };

    const map = new google.maps.Map(document.getElementById("map"), {
        center: location,
        zoom: 14,
        draggable: false,
        scrollwheel: true,
        zoomControl: true,
        fullscreenControl: true,
        mapTypeControl: false,
        streetViewControl: false,
    });

    // Custom SVG marker from contact section
    const svgPin = `
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="#F7C11F">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/>
        </svg>
    `;
    const iconUrl =
        "data:image/svg+xml;charset=UTF-8," + encodeURIComponent(svgPin);

    const customIcon = {
        url: iconUrl,
        scaledSize: new google.maps.Size(48, 48),
    };

    new google.maps.Marker({
        position: location,
        map,
        title: "Zăpodeni, Vaslui",
        icon: customIcon,
    });
};
