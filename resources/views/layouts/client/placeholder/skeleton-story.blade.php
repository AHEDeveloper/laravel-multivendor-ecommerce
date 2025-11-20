<div>
    <style>
        .story-skeleton {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .skeleton-item {
            margin: 0 10px;
            text-align: center;
            border-radius: 15px;
            border: 2px solid #e0e0e0;
            background-color: #f7f7f7;
            padding: 10px;
            position: relative;
            overflow: hidden;
        }

        .skeleton-image {
            width: 80px;
            /* عرض دایره */
            height: 80px;
            /* ارتفاع دایره */
            border-radius: 50%;
            /* ایجاد شکل دایره */
            background: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            margin-bottom: 8px;
        }

        .skeleton-title {
            width: 60px;
            height: 12px;
            border-radius: 5px;
            background: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            margin: 0 auto;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: 0 0;
            }
        }
    </style>

    <div class="story-skeleton">

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

        <div class="skeleton-item">
            <div class="skeleton-image"></div>
            <div class="skeleton-title"></div>
        </div>

    </div>
</div>
