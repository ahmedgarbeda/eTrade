import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Footer extends Component {
    render() { 
        return ( 
            <div className="bg-dark py-3" id="contact-us">
                <div className="container pt-5">
                    <div className="row">
                        <div className="col-8">
                            <h2 className="text-left mb-5"><strong>Contact Us</strong></h2>
                            <form method="post">
                                <div className="form-group">
                                    <label className="" htmlFor="name">Name</label>
                                    <input required id="name" className="form-control" type="text" name="name" placeholder="name" />
                                </div>
                                <div className="form-group">
                                    <label className="" htmlFor="email">E-mail</label>
                                    <input required id="email" className="form-control" type="email" name="email" placeholder="email" />
                                </div>
                                <div className="form-group">
                                    <label className="" htmlFor="password">Message</label>
                                    <textarea required className="form-control" col="18">

                                    </textarea>
                                </div>
                                <div className="form-group">
                                    <button className="btn btn-info btn-block" type="submit">Send</button>
                                </div>
                            </form>
                        </div>
                        <div className="col-4">
                            <div className="pb-2">
                                <i className="fas fa-map-marker-alt"></i><span className="px-3 h5">Nasr city, Cairo, Egypt</span>
                            </div>
                            <div className="pb-2">
                                <i className="fas fa-phone-alt"></i><span className="px-3 h5">+25 418751</span>
                            </div>
                            <div className="pt-3">
                                <a href="#" className="social"><i className="fab fa-facebook-f fa-2x pr-3"></i></a>
                                <a href="#" className="social"><i className="fab fa-instagram fa-2x pr-3"></i></a>
                                <a href="#" className="social"><i className="fab fa-twitter fa-2x pr-3"></i></a>
                            </div>
                            <div className="pt-2">
                                <img className="img-fluid" src="images/maps.png" alt="location" />
                            </div>
                        </div>
                    </div>
                </div>
                <hr className="mt-4 border-light" />
                <h5 className="text-center">&copy; All right reserved.</h5>
            </div>
         );
    }
}
 
export default Footer;