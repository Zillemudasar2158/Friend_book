import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function updateLikeStatus(postId, type) {
        fetch(`/posts/${postId}/${type}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            // Update like count
            document.getElementById(`like-count-${postId}`).innerText = data.likes_count;

            // Replace button
            const section = document.getElementById(`like-section-${postId}`);
            if (type === 'like') {
                section.innerHTML = `
                    <button class="unlike-btn bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700" data-id="${postId}">
                        👎 Unlike
                    </button>
                    <div class="mt-1 text-gray-600 text-sm">
                        ❤️ <span id="like-count-${postId}">${data.likes_count}</span>
                    </div>
                `;
            } else {
                section.innerHTML = `
                    <button class="like-btn bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700" data-id="${postId}">
                        👍 Like
                    </button>
                    <div class="mt-1 text-gray-600 text-sm">
                        ❤️ <span id="like-count-${postId}">${data.likes_count}</span>
                    </div>
                `;
            }

            attachEventListeners(); // Reattach events after replacing DOM
        });
    }

    function attachEventListeners() {
        document.querySelectorAll('.like-btn').forEach(button => {
            button.onclick = () => {
                const postId = button.dataset.id;
                updateLikeStatus(postId, 'like');
            };
        });

        document.querySelectorAll('.unlike-btn').forEach(button => {
            button.onclick = () => {
                const postId = button.dataset.id;
                updateLikeStatus(postId, 'unlike');
            };
        });
    }

    attachEventListeners(); // Initial call
});

//delete function
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const postId = this.dataset.id;

            fetch(`/postsdel/${postId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not OK");
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // DOM se hatao
                    const postElement = document.getElementById(`post-${postId}`);
                    if (postElement) {
                        postElement.remove();
                    }
                    console.log('Deleted:', data.success);
                } else {
                    console.warn(data.error);
                }
            })
            .catch(error => {
                console.error('Error deleting post:', error);
            });
        });
    });
});
