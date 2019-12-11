import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class Header extends Component {
    constructor() {
        super();
        this.state = {
            counter: 1
        }
    }

    componentDidMount() {
        this.timer = setInterval(() => {
            (this.state.counter == 3) ? this.state.counter = 0 : '';
            
            this.setState({ counter: this.state.counter + 1 });
        }, 3500);
    }

    render() {
        return ( 
            <div className="bg-secondary pt-5">
                <div className="container pt-1">
                    <div className="position-absolute py-5">
                        <h1 className="pt-5 display-4 font-weight-bolder">Say yes to adventure</h1>
                        <p className="h5 pb-4">Our store designed for your journey. </p>
                        <Link to="/">
                            <button className="btn btn-primary">Shop Now</button>
                        </Link>
                    </div>
                </div>
                <img className="img-fluid" src={`images/${this.state.counter}.jpg`}  alt="show"/>
            </div>
         );
    }
}
 
export default Header;