import React, { Component } from 'react';

class AddProduct extends Component {
    render() {
        return(
            <div className="card">
                <div className="card-header h2">Create New Product</div>
                    <div className="card-body">
                        <form method="post">
                        <div className="form-group">
                                <label htmlFor="exampleInputPassword1">Category</label>
                                <button aria-expanded="false" className="btn btn-lg dropdown-toggle text-black-50 w-100 m-0 border roles" data-toggle="dropdown" type="button">choose one</button>
                                <div className="dropdown-menu text-center bg-light" role="menu">
                                    <a className="dropdown-item" href="#" role="presentation">Category One</a>
                                    <a className="dropdown-item" href="#" role="presentation">Category Two</a>
                                    <a className="dropdown-item" href="#" role="presentation">Category Three</a>
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputName1">Name</label>
                                <input type="text" className="form-control" id="exampleInputName1" aria-describedby="emailHelp" />
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputPrice">Price</label>
                                <input type="number" className="form-control" id="exampleInputPrice" />
                            </div>
                            <div className="form-group">
                                <label htmlFor="desc">description</label>
                                <textarea type="text" className="form-control" id="desc" col="18"></textarea>
                            </div>
                            <div className="form-group">
                                <button className="btn btn-primary btn-block" type="submit">Add Price</button>
                            </div>
                        </form>
                    </div>
            </div>
        );
    }
}
 
export default AddProduct;