import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Aboutus extends Component {
    render() { 
        return ( 
            <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                <div className="row">
                    <div className="col-6 py-5">
                        <h1 className="">Our Team</h1>
                        <p>This our final project after three month internship in Information Technology Institute (ITI) simple e-commerce wibsite based on web application we implement this project with latest available tools and technologies. That was a great experience.</p>
                        <div className="pt-3">
                            <span className="pr-3 h3">Find US:</span>
                            <a href="#" className="social"><i className="fab fa-facebook-f fa-2x pr-3"></i></a>
                            <a href="#" className="social"><i className="fab fa-instagram fa-2x pr-3"></i></a>
                            <a href="#" className="social"><i className="fab fa-twitter fa-2x pr-3"></i></a>
                        </div>
                    </div>
                    <div className="col-6 text-center">
                        <img className="img-fluid" src="images/about.png" alt="about"/>
                    </div>
                </div>
            </div>
         );
    }
}
 
export default Aboutus;