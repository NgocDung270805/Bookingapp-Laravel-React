/**
 * Format a number as VND currency
 * @param {number} amount - The amount to format
 * @returns {string} Formatted amount with VND currency symbol
 */
export const formatCurrency = (amount) => {
    return new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND'
    }).format(amount);
};

/**
 * Format a date string to localized format
 * @param {string} dateString - The date string to format
 * @returns {string} Formatted date
 */
export const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString('vi-VN');
};