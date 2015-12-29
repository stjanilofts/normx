var lost = require('lost');
//var typographic = require('typographic');

module.exports = {
	postcss: [lost()],
	// disable autoprefixer since cssnext comes with it 
	autoprefixer: false
}