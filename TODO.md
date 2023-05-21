## URL Hashing System Updates

This document outlines the planned updates for the URL Hashing System. The following features and improvements will be implemented:

1. **Add Tracking to Not Found URLs**: Implement tracking functionality to capture and log information about URLs that result in "not found" errors. This will provide insights into the usage and popularity of non-existent URLs.

2. **Add Filters, Pagination, and Sorting**: Enhance the API endpoints to support filtering, pagination, and sorting options. This will allow users to retrieve specific subsets of URLs based on criteria such as creation date, views count, or other relevant attributes.

3. **Check for URL Collision before Saving**: Implement a mechanism to check for URL collisions before saving a new URL entry. This will ensure that no duplicate URLs are stored in the system, maintaining uniqueness and preventing conflicts.

4. **URL Validation**: Implement URL validation to ensure that the provided URL is in the correct format before saving it. This will help prevent invalid or malformed URLs from being stored in the system.

5. **Remove Privacy-Aware Parameters**: Implement a mechanism to remove privacy-aware parameters from URLs. This will help protect user privacy by removing sensitive information such as session IDs or user-specific identifiers.

6. **Authentication for Admin Routes**: Secure the admin routes with authentication to restrict access to authorized users only. This will help protect sensitive administrative functions and data.

7. **Request Analysis Job**: Create a background job that analyzes all requests at specific intervals. This job will update the total views count for each URL based on the request data. This will provide accurate and up-to-date information about the popularity and usage of each URL.
