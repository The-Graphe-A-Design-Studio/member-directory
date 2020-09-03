module.exports = {
    publicPath: process.env.NODE_ENV === 'https://developers.thegraphe.com'
        ? '/member-directory/'
        : '/'
}