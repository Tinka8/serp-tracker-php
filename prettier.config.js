const config = {
	parser: "php",
	printWidth: 120,
	tabWidth: 4,
	useTabs: false,
	semi: true,
	singleQuote: true,
	trailingComma: "all",
	bracketSpacing: true,
	phpVersion: "8.2",
	trailingCommaPHP: true,
	braceStyle: "psr-2",
	plugins: ["@prettier/plugin-php"],
};

module.exports = config;