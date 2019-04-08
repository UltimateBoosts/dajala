import React, { Component } from 'react'
import CanvasJSReact from '../../lib/canvasjs.react'
const CanvasJS = CanvasJSReact.CanvasJS;
const CanvasJSChart = CanvasJSReact.CanvasJSChart;
import API from '../../config/api'
class Reports extends Component {
	constructor() {
		super();
		this.addSymbols = this.addSymbols.bind(this);
		this.state = {
			reports: [],
			errors: '',
			options: []
		}
	}
	async componentDidMount() {
		await axios.get(`${API.REPORTS}`).then(response => {
			response.data.response
			this.setState({
				reports: response.data.response
			})
		}).catch(error => {
			this.setState({
				errors: error.response.data.error
			})
		})
		let options = []
		let reports = this.state.reports
		if (reports != []) {
			let names = Object.keys(reports)
			names.map(name => {
				let dataPoints = reports[name]
				let option = {
					animationEnabled: true,
					theme: "light2", // "light1", "light2", "dark1", "dark2"
					title: {
						text: "Report by " + name
					},
					axisY: {
						title: "Sales",
						labelFormatter: this.addSymbols,
						scaleBreaks: {
							autoCalculate: true
						}
					},
					axisX: {
						title: name,
						labelAngle: 0
					},
					data: [{
						type: "column",
						dataPoints: dataPoints
					}]
				}
				options.push(option)
			})
			this.setState({
				options: options
			})
		}

	}
	addSymbols(e) {
		var suffixes = ["", "K", "M", "B"];
		var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

		if (order > suffixes.length - 1)
			order = suffixes.length - 1;

		var suffix = suffixes[order];
		return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
	}

	render() {
		const { options } = this.state
		return (
			<div className="report">
				<div className='container py-4'>
					<div className='row justify-content-center'>
						{options.length > 0 &&
							options.map(option => (
								<CanvasJSChart options={option}
									onRef={ref => this.chart = ref}
									key={option.title.text}
								/>
							))
						}

					</div>
				</div>
			</div>

		);
	}
}

export default Reports
