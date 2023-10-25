function alert(type, msg) {
    let bs_class = '';

    if (type === 'success') {
        bs_class = 'alert-success';
    } else if (type === 'warning') {
        bs_class = 'alert-warning';
    } else {
        bs_class = 'alert-danger';
    }

    // Remove existing alert elements
    let existingAlert = document.getElementById('alertMessage');
    if (existingAlert) {
        existingAlert.remove();
    }

    let element = document.createElement('div');
    element.classList.add('d-lg-flex', 'flex-row', 'justify-content-end', 'fixed-top', 'mt-5', 'pt-lg-4', 'pt-sm-0');
    element.id = 'alertMessage';
    element.innerHTML = `
        <div class="col-lg-4 col-md-6 col-sm-12 mt-5 mt-sm-0 py-sm-0 pt-lg-1">
            <div class="alert ${bs_class} alert-dismissible fade show me-lg-5 ms-md-5 mx-5 shadow mt-sm-0" role="alert">
                <strong>${msg}</strong>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    `;

    document.body.appendChild(element); // Append the element to the body to make it visible

    // Simulate closing after 5 seconds
    setTimeout(() => {
        let closeButton = element.querySelector('.btn-close');
        if (closeButton) {
            closeButton.click(); // Simulate clicking the close button
            setTimeout(() => {
                element.remove(); // Remove the entire element after a brief delay
            }, 200); // Delay in milliseconds (adjust as needed)
        }
    }, 1800); // 1800 milliseconds = 1.5 seconds
}

function filteration(data) {
    const sanitizedData = {};

    for (const key in data) {
        if (data.hasOwnProperty(key)) {
            let value = data[key];

            // Remove leading/trailing whitespace
            value = value.trim();

            // Remove backslashes (useful for escaping)
            value = value.replace(/\\/g, '');

            // Convert special characters to HTML entities
            value = value.replace(/&/g, '&amp;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;')
                        .replace(/"/g, '&quot;')
                        .replace(/'/g, '&#039;');

            // Remove HTML and PHP tags
            value = value.replace(/<[^>]*>/g, '');

            // Store the sanitized value
            sanitizedData[key] = value;
        }
    }

    return sanitizedData;
}

function alert_modal(type, msg) {
    let bs_class = '';

    if (type === 'success') {
        bs_class = 'alert-success';
    } else if (type === 'warning') {
        bs_class = 'alert-warning';
    } else {
        bs_class = 'alert-danger';
    }

    let element = document.createElement('div');
    element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show mb-2" role="alert">
            <strong>${msg}</strong>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;

    let alertElement = document.getElementById('alert_div');
    if (alertElement) {
        alertElement.innerHTML = ''; // Clear the existing content of the "demo" div
        alertElement.appendChild(element); // Append the new element inside the "demo" div
    } else {
        console.error('Element with ID "alert_div" not found');
    }

    // Simulate closing after 5 seconds
    setTimeout(() => {
        let closeButton = element.querySelector('.btn-close');
        if (closeButton) {
            closeButton.click(); // Simulate clicking the close button
            setTimeout(() => {
            element.remove(); // Remove the entire element after a brief delay
            }, 200); // Delay in milliseconds (adjust as needed)
        }
    }, 1800); // 1800 milliseconds = 1.5 seconds
}
